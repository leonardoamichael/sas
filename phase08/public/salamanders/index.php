<?php

require_once('../../private/initialize.php');

// Use the find_all_salamanders() function to get an associative array
$salamander_set = find_all_salamanders();

$page_title = 'Salamanders';
include(SHARED_PATH . '/salamander-header.php');

?>

<h1>Salamanders</h1>

<a href="<?php echo url_for('salamanders/create.php'); ?>">Create Salamander</a>

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

    <?php while ($salamander = mysqli_fetch_assoc($salamander_set)) { ?>
        <tr>
            <td><?php echo h($salamander['id']); ?></td>
            <td><?php echo h($salamander['name']); ?></td>
            <td><?php echo h($salamander['habitat']); ?></td>
            <td><?php echo h($salamander['description']); ?></td>
            <td><a href="<?php echo url_for('/salamanders/show.php?id=' . u($salamander['id'])); ?>">View</a></td>
            <td><a href="<?php echo url_for('/salamanders/edit.php?id=' . u($salamander['id'])); ?>">Edit</a></td>
            <td><a href="<?php echo url_for('/salamanders/delete.php?id=' . u($salamander['id'])); ?>">Delete</a></td>
        </tr>
    <?php } ?>

</table>

<?php
// Free the result set
mysqli_free_result($salamander_set);
?>

<p>
    Thanks to <a href="https://herpsofnc.org">Amphibians and Reptiles of North Carolina</a>
</p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
