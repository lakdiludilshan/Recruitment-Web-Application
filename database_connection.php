<?php
function connectToDatabase()
{
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'recruitmeDB';

    $connection = mysqli_connect($host, $username, $password, $database);

    if (!$connection) {
        die('Database connection failed: ' . mysqli_connect_error());
        echo "Connection unsuccessful";
    }

    return $connection;
}
?>