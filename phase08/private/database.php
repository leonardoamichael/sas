<?php

require_once('db_credentials.php');

// Establish a database connection
function db_connect()
{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    confirm_db_connect();
    return $connection;
}

// Disconnect from the database
function db_disconnect($connection)
{
    if (isset($connection)) {
        mysqli_close($connection);
    }
}

// Confirm a successful database connection
function confirm_db_connect()
{
    if (mysqli_connect_errno()) {
        $msg = "Database connection failed: ";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}

// Confirm a successful database query
function confirm_result_set($result_set)
{
    if (!$result_set) {
        exit("Database query failed.");
    }
}