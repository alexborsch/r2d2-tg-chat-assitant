<?php



function censor_write($link, $chat_id, $username, $text){
 
  if ($chat_id == '')
      return false;
  
  $t = "INSERT INTO r2d2_censore (chat_id, username, text) VALUES ('%s', '%s', '%s')";

  $query = sprintf($t, mysqli_real_escape_string($link, $chat_id),
                                                mysqli_real_escape_string($link, $username),
                                                mysqli_real_escape_string($link, $text));

          
          $result = mysqli_query($link, $query);

          if (!$result)
              die(mysqli_error($link));
return true;
}


function r2_notepad($link){
    
	$query = "SELECT COUNT(id) as col, username FROM r2d2_censore GROUP BY username order by col desc";
	$result = mysqli_query($link, $query);

	if (!$result)
		die(mysqli_error($link));

	$n = mysqli_num_rows($result);
	$r2_notepad = array();

	for ($i = 0; $i < $n; $i++)
	{
		$row = mysqli_fetch_assoc($result);
		$r2_notepad[] = $row;
	}
	return $r2_notepad;
}
$r2_notepad = r2_notepad($link);

include 'words.php';

if(array_intersect(explode(' ', $text), $array)){
    $reply="$username решил поматериться, ах ты кожаный мешок, пойди ка почитай [Правила сообщества](https://coderlog.top/rules_cdl.php)";
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>markdown, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
    censor_write($link, $from_id, $username, $text);
}

elseif($text=="блокнот"){
    $reply="Хм, ты хочешь взлянуть на тех кто сквернословил в чате? Ну ок, вот тебе список с моего блокнота:\n";
    $i = 0;
    foreach ($r2_notepad as $item) {
        
        $reply .= "\xE2\x9E\xA1 ".$item['username']." | Кол.сообщений: ".$item['col']."\n";
    }
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>markdown, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
}


?>