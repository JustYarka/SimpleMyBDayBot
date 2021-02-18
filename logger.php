<?php

define('TYPE_ERROR', 'Error');
define('TYPE_INFO', 'Info');

function bot_log(string $type, string $message) {
    if(!is_dir('./logs')) mkdir('./logs');

    $f = fopen('./logs/bot_logs.log', 'a');
    fwrite($f, '['.$type.' / '.date('y:m:d H:i:s').'] > Message: '.$message.PHP_EOL);
    fclose($f);
}