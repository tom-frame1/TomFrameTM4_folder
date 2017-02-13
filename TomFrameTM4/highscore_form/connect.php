<?php

function connectDB()
{
    $db = new mysqli('127.0.0.1', 'root', 'root', 'bit695_db');
    if ($db->connect_errno) {
        echo "Error: Failed to make MySQL connection: \n";
        echo "Errno: " . $db->connect_errno . "\n";
        echo "Error: " . $db->connect_error . "\n";
        exit;
        }
    return $db;
}

$dbc = connectDB();
?>