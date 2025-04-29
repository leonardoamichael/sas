<?php

require_once('../../private/initialize.php');
include(SHARED_PATH . '/salamander-header.php');

$errors = [];

if (is_post_request()) {
    $salamander = [];
    $salamander['name'] = $_POST['name'] ?? '';
    $salamander['habitat'] = $_POST['habitat'] ?? '';
    $salamander['description'] = $_POST['description'] ?? '';

    $result = insert_salamander($salamander);

    if ($result === true) {
        $new_id = mysqli_insert_id($db);
        redirect_to(url_for('/salamanders/show.php?id=' . $new_id));
    } else {
        $errors = $result;
    }
} else {
    // Display the blank form
    $salamander = [];
    $salamander['name'] = '';
    $salamander['habitat'] = '';
    $salamander['description'] = '';
}

// Handle testing options
$test = $_GET['test'] ?? '';

if ($test == '404') {
    error_404();
} elseif ($test == '500') {
    error_500();
} elseif ($test == 'redirect') {
    redirect_to(url_for('/salamanders/index.php'));
}

?>

<?php $page_title = 'Create Salamander'; ?>

<div id="content">

    <a class="back-link" href="<?php echo url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

    <div class="subject new">
        <h1>Create Salamander</h1>

        <?php echo display_errors($errors); ?>

        <form action="<?php echo url_for('/salamanders/create.php'); ?>" method="post">
            <dl>
                <dt>Name</dt>
                <dd><input type="text" name="name" value="" /></dd>
            </dl>

            <dl>
                <dt>Habitat</dt>
                <dd>
                    <textarea name="habitat" rows="4" cols="50"></textarea>
                </dd>
            </dl>

            <dl>
                <dt>Description</dt>
                <dd>
                    <textarea name="description" rows="4" cols="50"></textarea>
                </dd>
            </dl>

            <div id="operations">
                <input type="submit" value="Create Salamander" />
            </div>
        </form>

    </div>

</div>

<?php include(SHARED_PATH . '/salamander-footer.php'); ?>
