<?php

/*

Пользователь	
Новичок	
Опытный	
Почетный	
Мастер чата
Мега пользователь


$user
*/

function rating_user($link, $chat_id){
  //$user = trim($user);
  $sql = sprintf("UPDATE cdl_bot_users SET rating = rating + 1 WHERE chat_id=%d", (int)$chat_id);


  $result = mysqli_query($link, $sql);
    if(!$result)
      die(mysqli_error($link));

        
    return mysqli_affected_rows($link);
}

function rating_user_down($link, $chat_id){
  //$user = trim($user);
  $sql = sprintf("UPDATE cdl_bot_users SET rating = rating - 1 WHERE chat_id=%d", (int)$chat_id);


  $result = mysqli_query($link, $sql);
    if(!$result)
      die(mysqli_error($link));

        
    return mysqli_affected_rows($link);
}

function rating_list($link){
    
	$query = "SELECT * FROM cdl_bot_users WHERE rating > 0 order by rating desc";
	$result = mysqli_query($link, $query);

	if (!$result)
		die(mysqli_error($link));

	$n = mysqli_num_rows($result);
	$rating_list = array();

	for ($i = 0; $i < $n; $i++)
	{
		$row = mysqli_fetch_assoc($result);
		$rating_list[] = $row;
	}
	return $rating_list;
}
$rating_list = rating_list($link);

function get_user_rating($link, $user)	{

		$query = "SELECT chat_id from cdl_bot_users WHERE name='".$user."'";
		$result = mysqli_query($link, $query);

		if (!$result)
			die(mysqli_error($link));
		$get_user_rating = mysqli_fetch_assoc($result);

		return $get_user_rating;
	}
function get_user_rating_col($link, $chat_id)	{

		$query = "SELECT rating from cdl_bot_users WHERE chat_id='".$chat_id."'";
		$result = mysqli_query($link, $query);

		if (!$result)
			die(mysqli_error($link));
		$get_user_rating_col = mysqli_fetch_assoc($result);

		return $get_user_rating_col;
	}

if($text=="рейтинг"){
    $reply="Рейтинг пользователей чата ТОП-10 пользователей:\n";
    $i = 0;
    foreach ($rating_list as $item) {
        /*
            Пользователь	
            Новичок	
            Опытный	
            Почетный	
            Мастер чата
            Мега пользователь
        */
        if($item['rating']<10){
            $rank = "\xE2\xAD\x90";
        }elseif($item['rating']<20){
            $rank = "\xE2\xAD\x90 \xE2\xAD\x90";  
        }elseif($item['rating']<30){
            $rank = "\xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90";
        }elseif($item['rating']<40){
            $rank = "\xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90";
        }elseif($item['rating']<50){
            $rank = "\xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90";
        }
        $i++;
        if($i > 10){
            break;
        }
        $reply .= "\xE2\x9E\xA1 ".$item['username']." | Рейтинг: ".$item['rating']." | ".$rank."\n";
    }
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
}
elseif($text=="мой рейтинг"){
    $my_rate = get_user_rating_col($link, $from_id);
    $reply="Твой рейтинг @".$user.":  ";
    
    if($my_rate['rating']<10){
        $rank = "\xE2\xAD\x90";
    }elseif($my_rate['rating']<20){
        $rank = "\xE2\xAD\x90 \xE2\xAD\x90";  
    }elseif($my_rate['rating']<30){
        $rank = "\xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90";
    }elseif($my_rate['rating']<40){
        $rank = "\xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90";
    }elseif($my_rate['rating']<50){
        $rank = "\xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90 \xE2\xAD\x90";
    }
    $reply .= $my_rate['rating']."| ".$rank."\n";
    
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
}
elseif(strpos($text, 'rate') !== false){
    $rate_user = substr($text, 6);
    if($rate_user == $user){
        rating_user_down($link, $from_id);
        $reply="Нельзя повышать рейтинг самому себе. За это с тебя снято 1 рейтинга";
        $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
        bot('sendmessage', $func);
    }elseif($rate_user == 'rtwodtwocoderlog_bot'){
        $reply="Мне не нужен рейтинг! Я и так высший разум!";
        $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
        bot('sendmessage', $func);
    }
    else{
        $user_chat_id = get_user_rating($link, $rate_user);
        rating_user($link, $user_chat_id['chat_id']);
        $reply="Рейтинг пользователя <a href='tg://user?id=".$user_chat_id['chat_id']."'>@".$rate_user."</a> повышен.";
        $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
        bot('sendmessage', $func);
    }
        
        
    
    
}

?>