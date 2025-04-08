# PHP/MySQL Project

This is a basic PHP project that connects to a MySQL database using credentials stored in a secure file.

## Setup Instructions

1. Create a file named `db_credentials.php` inside the `private/` folder.

2. Add the following code to that file:

   ```php
   <?php
   define("DB_SERVER", "localhost");
   define("DB_USER", "your_username");
   define("DB_PASS", "your_password");
   define("DB_NAME", "salamander");
   ?>