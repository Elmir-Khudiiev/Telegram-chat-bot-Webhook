<?php

include('vendor/autoload.php');

use classes\TelegramBot;
use classes\Database;

$database = new Database;
$tbot = new TelegramBot;


$update = $tbot->getChatData();

$pretext = $database->getAnswer($update->message->text);
$text = $pretext[rand(0, count($pretext) - 1)];

$tbot->sendMessage($update->message->chat->id, $text);

exit('ok');