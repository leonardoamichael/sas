<?php

// Create the find_all_salamanders() function
// This function should return an associative array of salamanders
// Remember that $db needs to be global in scope

function find_all_salamanders() {
    global $db;

    $sql = "SELECT * FROM salamander";
    $result = mysqli_query($db, $sql);

    if (!$result) {
        die("Database query failed: " . mysqli_error($db));
    }

    return $result;
}
?>