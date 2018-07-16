<?php

$jsonFile = json_decode(file_get_contents(__DIR__. '/set.json'), true);

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'help-line@inbox.ru',
    'user.passwordResetTokenExpire' => 3600,
    'Params' => $jsonFile,
];
