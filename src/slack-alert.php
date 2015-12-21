<?php

return [
    'level' => \Monolog\Logger::ERROR,
    'enviroments' => ['production'],
    'token' => env('SLACK_TOKEN', false),
    'channel' => env('SLACK_CHANNEL', '#general'),
    'app_name' => env('SLACK_NAME', 'Laravel Site'),
    'mention_to' => env('SLACK_MENTION_TO', '!everyone'),
];