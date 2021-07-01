<?php
include('../../settings.php');

error_reporting(1);
ob_start();
$API_KEY = "";

define('API_KEY',$API_KEY);

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url); curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
        
    }
    
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$name = $message->from->first_name;
$user = $message->from->username;
$message_id = $update->message->message_id;
$from_id = $update->message->from->id;
$mid = $message->message_id;
$type = $message->chat->type;
$name = $message->from->first_name;
$surname = $message->from->last_name;
$username = $name . ' ' . $surname;


$data = $update->callback_query->data;
$cmid = $update->callback_query->message->message_id;
$ccid = $update->callback_query->message->chat->id;
$cuid = $update->callback_query->message->from->id;
$qid = $update->callback_query->id;

$reply = $message->reply_to_message->text;

include "query.php";
include "censored.php";
include "rating.php";

$cdl_get_user = cdl_get_user($link, $from_id);
$old_id = $cdl_get_user['chat_id'];

$new_chat_members = $message->new_chat_member->id;
$left_chat_members = $message->left_chat_member->id;
$title = $message->chat->title;
if($new_chat_members){
  $reply = "*Привет * [$name](tg://user?id=$new_chat_members)!
Добро пожаловать в сообщество CoderLog
Правила сообщества находятся здесь -> [Правила](https://coderlog.top/rules/)
Информация о том как задонатить проекту есть здесь -> [Донат](https://coderlog.top/donate/)
Веди себя хорошо, мой руки с мылом, ешь витамины и слушайся маму ;)
Чтобы получить список всех команд напиши 'помощь'
Лучший крипта-кошелёк: [Trustee Wallet](https://trustee.deals/link/FMzBjNjQ)
  ";
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>$reply,
   'disable_web_page_preview'=>true,
   'parse_mode'=>'markdown'
 ]);
}
if($left_chat_members){
  $reply = "Нас только что покинул(а) уважаемый(ая) [$name](tg://user?id=$new_chat_members)
Надеюсь он(а) одумается и вернёться к нам, а мы ему(ей) всё простим  
";
   bot('sendmessage',[
   'chat_id'=>$chat_id,
   'text'=>$reply,
   'parse_mode'=>'markdown'
 ]);
}

cdl_add_user($link, $username, $from_id, $user, $old_id);
cdl_bot_textlog($link, $from_id, $username, $text);