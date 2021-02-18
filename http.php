<?php

function bot_request(string $address, string $method, array $params): string {
    return file_get_contents($address.'/'.$method.'?'.http_build_query($params));
}