<?php
$title = "Create Schedule";
ob_start();
?>

<div class="container mt-5">
    <h1>
        <?= $title ?>
    </h1>

    <form method="post" action="index.php?action=schedulestore">
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="mb-3">
            <label for="departureTime" class="form-label">Departure Time</label>
            <input type="time" class="form-control" id="departureTime" name="departureTime" required>
        </div>

        <div class="mb-3">
            <label for="arrivalTime" class="form-label">Arrival Time</label>
            <input type="time" class="form-control" id="arrivalTime" name="arrivalTime" required>
        </div>

        <div class="mb-3">
            <label for="availableSeats" class="form-label">Available Seats</label>
            <input type="number" class="form-control" id="availableSeats" name="availableSeats" required>
        </div>

        <div class="mb-3">
            <label for="bus" class="form-label">Bus</label>
            <select class="form-select" id="bus" name="bus" required>
                <?php foreach ($buses as $bus): ?>
                <option value="<?= $bus->getBusID() ?>">
                    <?= htmlspecialchars($bus->getBusNumber()) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="route" class="form-label">Route</label>
            <select class="form-select" id="route" name="route" required>
                <?php foreach ($routes as $route): ?>
                <option value="<?= $route->getRouteID() ?>">
                    <?= htmlspecialchars($route->getStartCityName()) ?> to
                    <?= htmlspecialchars($route->getEndCityName()) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <select class="form-select" id="company" name="company" required>
                <?php foreach ($companies as $company): ?>
                <option value="<?= $company->getCompanyID() ?>">
                    <?= htmlspecialchars($company->getCompanyName()) ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Schedule</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>