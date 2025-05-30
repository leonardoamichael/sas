<?php

require_once('../../private/initialize.php');

if (!isset($_GET['id'])) {
    redirect_to(url_for('/salamanders/index.php'));
}

$id = $_GET['id'];

if (is_post_request()) {
    // Handle form values sent by edit.php
    $salamander = [];
    $salamander['id'] = $id;
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';

    $result = update_salamander($salamander);
    if ($result === true) {
        redirect_to(url_for('/salamanders/show.php?id=' . $id));
    } else {
        $errors = $result;
        // Optional: Uncomment below for debugging
        // var_dump($errors);
    }
} else {
    $salamander = find_salamander_by_id($id);
}

?>

<?php $page_title = 'Edit Salamander'; ?>
<?php include(SHARED_PATH . '/salamander-header.php'); ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

    <div class="salamander edit">
        <h1>Edit Salamander</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for('/salamanders/edit.php?id=' . h(u($id))); ?>" method="post">
            <dl>
                <dt>Name</dt>
                <dd><input type="text" name="name" value="<?php echo h($salamander['name']); ?>" /></dd>
            </dl>

            <dl>
                <dt>Habitat</dt>
                <dd>
                    <textarea name="habitat" rows="4" cols="50"><?php echo h($salamander['habitat']); ?></textarea>
                </dd>
            </dl>

            <dl>
                <dt>Description</dt>
                <dd>
                    <textarea name="description" rows="4" cols="50"><?php echo h($salamander['description']); ?></textarea>
                </dd>
            </dl>

            <div id="operations">
                <input type="submit" value="Edit Salamander" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
