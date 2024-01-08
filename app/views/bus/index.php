<?php
$title = "Bus List";
ob_start();
?>

<div class="container mt-5">
    <h1>Bus List</h1>

    <!-- Add a link to create a new bus -->
    <a href="index.php?action=buscreate" class="btn btn-primary mb-3">Add New Bus</a>

    <?php if (!empty($buses)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Bus Number</th>
                <th>License Plate</th>
                <th>Company</th>
                <th>Capacity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($buses as $bus): ?>
            <tr>
                <td>
                    <?= $bus->getBusID() ?>
                </td>
                <td>
                    <?= $bus->getBusNumber() ?>
                </td>
                <td>
                    <?= $bus->getLicensePlate() ?>
                </td>
                <td>
                    <?= $bus->getCompany()->getCompanyName() ?>
                </td>
                <td>
                    <?= $bus->getCapacity() ?>
                </td>
                <td>
                    <!-- Add links to edit and delete each bus -->
                    <a href="index.php?action=busedit&id=<?= $bus->getBusID() ?>" class="btn btn-warning">Edit</a>
                    <a href="index.php?action=busdelete&id=<?= $bus->getBusID() ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p class="text-center">No buses found.</p>
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>