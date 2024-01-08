<?php
$title = "Create Route";
ob_start();
?>

<div class="container mt-5">
    <h1>
        <?= $title ?>
    </h1>

    <!-- Form for creating a new route -->
    <form method="post" action="index.php?action=routestore">
        <div class="mb-3">
            <label for="startCity" class="form-label">Start City</label>
            <!-- Dropdown for start city selection -->
            <select class="form-select" id="startCity" name="startCity" required>
                <?php foreach ($cities as $city): ?>
                    <option value="<?= $city->getCityID() ?>">
                        <?= $city->getCityName() ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="endCity" class="form-label">End City</label>
            <!-- Dropdown for end city selection -->
            <select class="form-select" id="endCity" name="endCity" required>

                <?php foreach ($cities as $city): ?>
                    <option value="<?= $city->getCityID() ?>">
                        <?= $city->getCityName() ?>
                    </option>
                <?php endforeach; ?>

            </select>
        </div>

        <div class="mb-3">
            <label for="distance" class="form-label">Distance</label>
            <input type="text" class="form-control" id="distance" name="distance" required>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Route</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>