<?php

require_once 'logger.php';
require_once 'http.php';

define('LINK', 'https://api.beycoder.ru');

$params = [
    'login' => 'nigol',
    'password' => 'drowssap'
];

$data = json_decode(bot_request(LINK, 'users.login', $params), true);
if (!$data['status']) {
    bot_log(TYPE_ERROR, $data['info']['message'] . ' (code: ' . $data['info']['code'] . ')');
    exit;
}

if($data['status']) {
    bot_log(TYPE_INFO, $data['info']['message'] . ' (code: ' . $data['info']['code'] . ')');
    $token = $data['result']['access_token'];
}

$data = json_decode(bot_request(LINK, 'users.changeStatus', [
    'token' => $token,
    'status' => 'Пажылой Тарантул'
]), true);

if(!$data['status']) {
    bot_log(TYPE_ERROR, $data['info']['message'] . ' (code: ' . $data['info']['code'] . ')');
    exit;
}

bot_log(TYPE_INFO, $data['info']['message'] . ' (code: ' . $data['info']['code'] . ')');
