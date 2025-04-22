<?php

// Create the find_all_salamanders() function
// This function should return an associative array of salamanders
// Remember that $db needs to be global in scope

function find_salamander_by_id($id) {
    global $db;

    $sql = "SELECT * FROM salamander WHERE id=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    confirm_result_set($result);
    $salamander = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $salamander;

}

function validate_salamander($salamander) {
  $errors = [];

  // menu_name
  if(is_blank($salamander['name'])) {
    $errors[] = "Name cannot be blank.";
  } elseif(!has_length($salamander['name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }

  // position
  // Make sure we are working with an integer
 
  if(is_blank($salamander['habitat'])) {
    $errors[] = "Habitat cannot be blank.";
  } elseif(!has_length($salamander['habitat'], ['max' => 255])) {
    $errors[] = "Habitat must be less than 255 characters.";
  }

  // visible
  // Make sure we are working with a string
  $visible_str = (string) $salamander['description'];
  if(is_blank($salamander['description'])) {
    $errors[] = "Description cannot be blank.";
  } elseif(!has_length($salamander['description'], ['max' => 1000])) {
    $errors[] = "Description must be less than 1000 characters.";
  }

  return $errors;
}



  function insert_salamander($salamander) {
    global $db;
  
    $errors = validate_salamander($salamander);
    if(!empty($errors)) {
      return $errors;
    }
  
    $sql = "INSERT INTO salamander (name, habitat, description) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $salamander['name'], $salamander['habitat'], $salamander['description']);
    $result = mysqli_stmt_execute($stmt);
  
    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function update_salamander($salamander) {
    global $db;
  
    $errors = validate_salamander($salamander);
    if(!empty($errors)) {
      return $errors;
    }
  
    $sql = "UPDATE salamander SET name=?, habitat=?, description=? WHERE id=? LIMIT 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $salamander['name'], $salamander['habitat'], $salamander['description'], $salamander['id']);
    $result = mysqli_stmt_execute($stmt);
  
    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

function delete_salamander($id) {
    global $db;

    $sql = "DELETE FROM salamander WHERE id=? LIMIT 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);

    // For DELETE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // DELETE failed
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