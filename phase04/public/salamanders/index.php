<?php

require_once('../../private/initialize.php');
// Use the fina_all_salamanders() function to get an associative array

$page_title = 'Salamanders';
include(SHARED_PATH . '/salamander-header.php');

?>
<h1>Salamanders</h1>

<a href="<?= url_for('salamanders/create.php'); ?>">Create Salamander</a>

<!-- Use CSS to style the table -->
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Habitat</th>
    <th>Desc</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  // Add PHP code here to loop through the $salamander_set array
  // and output the salamander data in a table

  // Use the h() function to escape data output
  // Use u() function to encode data for URLs
  // Use url_for() function to create URLs
  // Use the mysqli_fetch_assoc() function to get an associative array
  // Use the mysqli_free_result() function to free the result set


  Thanks to <a href="https://herpsofnc.org">Ampibians and Reptiles of North Carolina</a>

  <?php include(SHARED_PATH . '/salamander-footer.php'); ?>