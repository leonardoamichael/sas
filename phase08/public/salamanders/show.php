<?php

require_once('../../private/initialize.php');

$id = $_GET['id'] ?? '1'; // Default to 1 if no ID provided
$salamander = find_salamander_by_id($id);

if (!$salamander) {
    redirect_to(url_for('/salamanders/index.php'));
}

$page_title = 'View Salamander';
include(SHARED_PATH . '/salamander-header.php');

?>

<a href="<?php echo url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

<h1>Salamander: <?php echo h($salamander['name']); ?></h1>

<div class="attributes">
    <dl>
        <dt>Name</dt>
        <dd><?php echo h($salamander['name']); ?></dd>
    </dl>
    <dl>
        <dt>Habitat</dt>
        <dd><?php echo h($salamander['habitat']); ?></dd>
    </dl>
    <dl>
        <dt>Description</dt>
        <dd><?php echo h($salamander['description']); ?></dd>
    </dl>
</div>

<p>Page ID: <?php echo h($id); ?></p>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
