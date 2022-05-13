<?php

    require_once "global.php";

    $connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    mysqli_query($connection, 'SET NAMES "'.DB_ENCODE.'" ');

    if(mysqli_connect_errno())
    {
        printf("Connection Failed", mysqli_connect_error());
        exit();
    }

    if(!function_exists('runQuery'))
    {
        function runQuery($sql)
        {
            global $connection;
            $query = $connection->query($sql);
            return $query;
        }

        function runQueryRow($sql)
        {
            global $connection;
            $query = $connection->query($sql);
            $row = $query->fetch_assoc();
            return $row;
        }

        function cleanString($str)
        {
            global $connection;
            $str = mysqli_real_escape_string($connection, trim($str));
            return htmlspecialchars($str);
        }    
    }