<?php

return [
    'database' => [
        'name' => 'ottoman',
        'username' => 'root',
        'password' => 'steva',
        'connection' => 'mysql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];