<?php

    return [
            'credential' => [
                'host' => 'localhost',
                'db_username' => 'root',
                'db_password' => '',
                'dbname' => 'takeAway_db',
                'opt' => [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ],
            ],
            
    ];
    
?>