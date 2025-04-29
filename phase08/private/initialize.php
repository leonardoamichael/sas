<?php

// Define important directory paths
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

// Define web root dynamically based on current script location
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

// Include required function and class files
require_once('functions.php');
require_once('validation_functions.php'); // Added validation helpers
require_once('db_credentials.php');
require_once('database.php');
require_once('query_functions.php');

// Initialize database connection
$db = db_connect();

// Initialize an empty array for errors
$errors = [];
