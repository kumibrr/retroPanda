<?php

    $DB_HOST = 'localhost';
    $DB_USER = 'root';
    $DB_PASSWORD = '';
    $DB_NAME = 'RETROPANDA';

    $connection = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
    if(mysqli_connect_errno()){
        exit('Failed to connect to database: ' . mysqli_connect_error());
    }

?>