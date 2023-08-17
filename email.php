<?php
$file = 'data/login.json';
$jsonString = file_get_contents('data/login.json');
$data = json_decode($jsonString);
$content = json_decode($jsonString, true);

$email = $data->email;
$name = $data->name;
$senderMail = $data->sender;
$token = $data->token;
$chatid = $data->chatid;

$sender = "From: $name <$senderMail>";

$emailku = "$email";
?>