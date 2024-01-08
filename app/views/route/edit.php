<?php
$title = "Edit Route";
ob_start();
?>

<div class="container mt-5">
    <h1>
        <?= $title ?>
    </h1>
    <form method="post" action="index.php?action=routeupdate&id=<?= $route->getRouteID() ?>">
        <div class="mb-3">
            <label for="startCity">Start City</label>
            <select name="startCity" id="startCity" class="form-control" required>
                <?php foreach ($cities as $city): ?>
                <option value="<?= $city->getCityID() ?>"
                    <?= ($route->getStartCity()->getCityID() == $city->getCityID()) ? 'selected' : '' ?>>
                    <?= $city->getCityName() ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="endCity">End City</label>
            <select name="endCity" id="endCity" class="form-control" required>
                <?php foreach ($cities as $city): ?>
                <option value="<?= $city->getCityID() ?>"
                    <?= ($route->getEndCity()->getCityID() == $city->getCityID()) ? 'selected' : '' ?>>
                    <?= $city->getCityName() ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="distance">Distance</label>
            <input type="text" name="distance" id="distance" class="form-control"
                value="<?= htmlspecialchars($route->getDistance()) ?>" required>
        </div>

        <div class="mb-3">
            <label for="duration">Duration</label>
            <input type="text" name="duration" id="duration" class="form-control"
                value="<?= htmlspecialchars($route->getDuration()) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Route</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>