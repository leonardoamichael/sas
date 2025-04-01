<?php

// Create the find_all_salamanders() function
// This function should return an associative array of salamanders
// Remember that $db needs to be global in scope

function find_salamander_by_id($id) {
    global $db;

    $sql="SELECT * FROM salamander ";
    $sql.="WHERE id='" . $id . "'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $salamander = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $salamander;

}

function insert_salamander($name, $habitat, $description) {
    global $db;

    $sql = "INSERT INTO salamander ";
    $sql .= "(name, habitat, description) ";
    $sql .= "VALUES (";
    $sql .= "'" . $name . "',";
    $sql .= "'" . $habitat . "',";
    $sql .= "'" . $description . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

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