<?php
// localhost connection
// Creaate PHP constants for the database connection
// Here is an example
// define("DB_SERVER", "localhost");
define("DB_SERVER", "localhost");
define("DB_USER", "sally");
define("DB_PASS", "P@ssword1234");
define("DB_NAME", "salamanders");
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($connection);

// webhost connection
// use this connection when you upload your files to the webhost
// comment them out when working locally

// define("DB_SERVER", "localhost");
// define("DB_USER", "lmscuadv_sally");
// define("DB_PASS", "P@ssword1234");
// define("DB_NAME", "lmscuadv_salamanders");
// $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// if (!$connection) {
//   die("Connection failed: " . mysqli_connect_error());
// }

// mysqli_close($connection);