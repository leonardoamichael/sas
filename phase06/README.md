# PHP/MySQL Project

This is a basic PHP project that connects to a MySQL database using credentials stored in a secure, non-tracked file.

---

## Requirements

- PHP 7.4+
- MySQL 5.7+
- Web server (e.g., Apache, Nginx)

---

## Installation

1. **Create a `db_credentials.php` file:**

   Inside the `private/` folder (create it if it doesn't exist), create a file named `db_credentials.php` with the following content:

   ```php
   <?php
   define("DB_SERVER", "");
   define("DB_USER", "");
   define("DB_PASS", "");
   define("DB_NAME", "");
   ?>