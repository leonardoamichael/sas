<?php require_once('../../private/initialize.php'); 
include(SHARED_PATH . '/salamander-header.php');


$test = $_GET['test'] ?? '';

if($test == '404') {
  error_404();
} elseif($test == '500') {
  error_500();
} elseif($test == 'redirect') {
  redirect_to(url_for('/salamanders/index.php'));
}
?>

<?php $page_title = 'Create Salamander'; ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/salamanders/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Salamander</h1>

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
