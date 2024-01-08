<?php
$title = "Delete Schedule";
ob_start();
?>
<div class="container mt-5">

    <h1>
        <?= $title ?>
    </h1>
    <p>Are you sure you want to delete this schedule?</p>

    <form method="post" action="index.php?action=scheduledestroy&id=<?= $schedule->getScheduleID() ?>">
        <button type="submit" class="btn btn-danger">Delete Schedule</button>
        <a href="index.php?action=scheduleindex" class="btn btn-secondary">Cancel</a>
    </form>

</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>