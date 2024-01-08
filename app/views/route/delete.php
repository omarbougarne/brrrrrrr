<?php
$title = "Delete Route";
ob_start();
?>
<div class="container mt-5">

    <h1>
        <?php $title ?>
    </h1>
    <p>Are you sure you want to delete this route?</p>

    <form method="post" action="index.php?action=routedestroy&id=<?= $route->getRouteID() ?>">
        <button type="submit" class="btn btn-danger">Delete Route</button>
        <a href="index.php?action=routeindex" class="btn btn-secondary">Cancel</a>
    </form>


    <?php $content = ob_get_clean(); ?>
    <?php include_once 'app/views/include/layout.php'; ?>