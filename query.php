<?php
$r2 = "Привет. Я R2D2, Артудиту или Ардвадидва, коротко — R2, Арту или Ардва) — дроид-астромеханик, 
спутник C-3PO, созданный незадолго до 32 ДБЯ. Теперь я буду помогать CoderLog
и его админам вести чат и следить за порядком. У меня есть куча команд, которые 
помогут тебе не забыть правила, помочь нам с создателем копеечкой и напоминать о видео. 
Мои команды это просто слово, не нужно писать слэш. Я постоянно 
мониторю чат, и команда мне, может быть где-то в тексте сообщения из-за чего я могу среагировать. Так же идеально знаю 
правила чата и не дам матерится здесь! Даже не думай мат писать, я это увижу и запишу тебя в свой блокнот матершинников!
Чтобы узнать список всех команд, напиши 'помощь'";

$gif="https://media.giphy.com/media/CWkoXi05ji0Ny/source.gif";

if($text=="/start"){
    $reply="И зачем ты меня запустил?";
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>markdown, 'text'=>$reply];
    bot('sendmessage', $func);
}
elseif($text=="R2D2"){
    $link = "R2.mp3";
    $func = ['chat_id'=>$chat_id, 'audio'=>$link, 'caption'=>$r2];
    bot('sendAudio', $func);
}
elseif($text=="r2d2"){
    $link = "R2.mp3";
    $func = ['chat_id'=>$chat_id, 'audio'=>$link, 'caption'=>$r2];
    bot('sendAudio', $func);
}
elseif($text=="R2"){
    $link = "R2.mp3";
    $func = ['chat_id'=>$chat_id, 'audio'=>$link, 'caption'=>$r2];
    bot('sendAudio', $func);
}
elseif($text=="r2"){
    $link = "R2.mp3";
    $func = ['chat_id'=>$chat_id, 'audio'=>$link, 'caption'=>$r2];
    bot('sendAudio', $func);
}
elseif($text=="hey r2"){
    $link = "R2.mp3";
    $func2 = ['chat_id'=>$chat_id, 'audio'=>$link, 'caption'=>''];
    $func = ['chat_id'=>$chat_id, 'document'=>$gif, 'caption'=>$r2];
    bot('sendDocument', $func);
    bot('sendAudio', $func2);
}
elseif($text=="правила"){
    $reply="Ты и правда забыл правила? ну вот, почитай -> [Правила сообщества](https://coderlog.top/rules_cdl.php)";
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>markdown, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
}
elseif($text=="донат"){
    $reply="
Если вы хотите финансово поддержать развитие YouTube канала CoderLog,
то это можно сделать несколькими способами:

Перевод на карту банка
Monobank: 5375 4141 1654 5442
WebMoney:
USD: Z028972377851
RUB: R948841958517
DonationAlerts: <a href='https://www.donationalerts.com/r/coderlog'>Пожертвовать через DonationAlerts</a>

Обязательно указывайте своё имя или никнейм. Вы будете отображены в списке ТОП-ДОНАТЕРОВ канала.
Спасибо ;)
";
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
}
elseif($text=="монетка"){
    function roll () {
        return mt_rand(1,2);
    }
    if(roll() == 1){
        $coin = "Выпал орел";
    }else{
        $coin = "Выпала решка";
    }
    $reply=$coin;
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
}
elseif($text=="кости"){
    function roll () {
    return mt_rand(1,6);
    }
    $reply="Выпало число: \n\xF0\x9F\x8E\xB2   ".roll();
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
}
elseif($text=="помощь"){
    $reply="
Список всех доступных команд чата:
<b>hey r2</b> - информация о R2D2
<b>правила</b> - правила сообщества
<b>донат</b> - информация о донате
<b>монетка</b> - бот подбросит монетку
<b>кости</b> - бот подбросит кубик
<b>блокнот</b> - бот покажет список матершинников чата
<b>rate @ник_пользователя</b> - поставить оценку пользователю
<b>рейтинг</b> - ТОП-10 пользователей
<b>мой рейтинг</b> - покажет ваш рейтинг

";
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
}
?>