<?php
$title = "Create Bus";
ob_start();
?>

<div class="container mt-5">
    <h1>
        <?= $title ?>
    </h1>

    <!-- Form for creating a new bus -->
    <form method="post" action="index.php?action=busstore">
        <div class="mb-3">
            <label for="busNumber" class="form-label">Bus Number</label>
            <input type="text" class="form-control" id="busNumber" name="busNumber" required>
        </div>

        <div class="mb-3">
            <label for="licensePlate" class="form-label">License Plate</label>
            <input type="text" class="form-control" id="licensePlate" name="licensePlate" required>
        </div>
        <div class="mb-3">
            <label for="company" class="form-label">Company</label>
            <select class="form-control" id="company" name="company" required>

                <?php foreach ($companies as $company): ?>
                <option value="<?= $company->getCompanyID() ?>">
                    <?= $company->getCompanyName() ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Capacity</label>
            <input type="number" class="form-control" id="capacity" name="capacity" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Bus</button>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>