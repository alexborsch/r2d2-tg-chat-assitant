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
    $link = "https://botmanager.coderlog.top/bots/r2d2/R2.mp3";
    $func = ['chat_id'=>$chat_id, 'audio'=>$link, 'caption'=>$r2];
    bot('sendAudio', $func);
}
elseif($text=="r2d2"){
    $link = "https://botmanager.coderlog.top/bots/r2d2/R2.mp3";
    $func = ['chat_id'=>$chat_id, 'audio'=>$link, 'caption'=>$r2];
    bot('sendAudio', $func);
}
elseif($text=="R2"){
    $link = "https://botmanager.coderlog.top/bots/r2d2/R2.mp3";
    $func = ['chat_id'=>$chat_id, 'audio'=>$link, 'caption'=>$r2];
    bot('sendAudio', $func);
}
elseif($text=="r2"){
    $link = "https://botmanager.coderlog.top/bots/r2d2/R2.mp3";
    $func = ['chat_id'=>$chat_id, 'audio'=>$link, 'caption'=>$r2];
    bot('sendAudio', $func);
}
elseif($text=="hey r2"){
    $link = "https://botmanager.coderlog.top/bots/r2d2/R2.mp3";
    $func2 = ['chat_id'=>$chat_id, 'audio'=>$link, 'caption'=>''];
    $func = ['chat_id'=>$chat_id, 'document'=>$gif, 'caption'=>$r2];
    bot('sendDocument', $func);
    bot('sendAudio', $func2);
}
elseif($text=="правила"){
    $reply="Ты и правда забыл правила? ну вот, почитай -> [Правила сообщества](https://coderlog.top/rules/)";
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>markdown, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
}
elseif($text=="донат"){
    $reply="
Если вы хотите финансово поддержать проекта CoderLog,
и его автора <a href='https://t.me/oleksandr_borshch'>Alex Borsch</a>
то это можно сделать несколькими способами:

Перевод на карту банка (Украина)
Monobank: 5375 4141 1654 5442

BTC: 14pKyXTgFAs1msvc435xigM8p1152nYYAM
ETH: 0xE30c64293169016D6bD20e5e29A02c8e47d913Dc
TRX(Tron): TB1tttVo3Espu651Xnq6N4j25scsCa71mo
DOGE: DBtbVzzui8xzUUwvcafL2B26y2vUx3Cz7W
Лучший крипта-кошелёк: <a href='https://trustee.deals/link/FMzBjNjQ'>Trustee Wallet</a>

Обязательно указывайте своё имя или никнейм. Вы будете отображены в списке ТОП-ДОНАТЕРОВ канала.
Спасибо ;)
";
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
}
elseif($text=="ссылки"){
    $reply="
<b>Актуальные ссылки проекта CoderLog:</b>
Сайт: <a href='https://coderlog.top'>coderlog.top</a>
YouTube: <a href='https://www.youtube.com/channel/UCQFJjX4FFGp4zLWo1R-viKQ'>CoderLog</a>
Twitter: <a href='https://twitter.com/coderlogtop'>CoderLog</a>
Google News: <a href='https://news.google.com/publications/CAAqBwgKMIDSngswl9y2Aw?oc=3&ceid=UA:ru'>CoderLog News</a>
Instagram: <a href='https://www.instagram.com/coderlog_project/'>CoderLog Projects</a>
<b>Ссылки автора проекта:</b>
Instagram: <a href='https://www.instagram.com/oleksandr_borsch/'>Alex Borsch Instagram</a>
Twitter: <a href='https://twitter.com/borsch_alex'>Alex Borsch Twitter</a>
GitHub: <a href='https://github.com/alexborsch'>Alex Borsch GitHub</a>

Лучший крипта-кошелёк: <a href='https://trustee.deals/link/FMzBjNjQ'>Trustee Wallet</a>
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
<b>ссылки</b> - ссылки проекта и автора
<b>hey r2</b> - информация о R2D2
<b>правила</b> - правила сообщества
<b>донат</b> - информация о донате
<b>что нового?</b> - покажет последние новости с сайта
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

elseif($text=="что нового?"){
    $reply="\xF0\x9F\x93\xB0 Последние новости из сайта CoderLog:\n\n";
    $html=simplexml_load_file('https://coderlog.top/index.xml');
    $i = 0;
    foreach ($html->channel->item as $item) {
        $i++;
        if($i > 10){
            break;
        }
        $reply .= "\xE2\x9E\xA1 <a href='".$item->link."'>".$item->title."</a>\nДата: ".$item->pubDate."\n";
    }
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
    bot('sendmessage', $func);
}


elseif($text=="1test"){
    
    $reply = "testing pin message";
    
    $func = ['chat_id'=>$chat_id, 'parse_mode'=>html, 'disable_web_page_preview'=>true, 'text'=>$reply];
    $func2 = ['chat_id'=>$chat_id, 'message_id'=>$message_id, 'disable_notification'=>'no'];
    bot('sendmessage', $func);
    bot('pinChatMessage', $func2);
}


?>