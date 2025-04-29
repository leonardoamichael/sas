<?php
// Check if $page_title is set; if not, set a default.
if (!isset($page_title)) {
    $page_title = 'Salamanders';
}
?>

<!doctype html>
<html lang="en">
<head>
    <title>SAS - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/salamanders.css'); ?>" />
</head>

<body>
    <header>
        <h1><a href="<?php echo url_for('/'); ?>">Southern Appalachian Salamanders (SAS)</a></h1>
    </header>

    <nav>
        <ul>
            <li><a href="<?php echo url_for('salamanders/'); ?>">Salamanders</a></li>
        </ul>
    </nav>


