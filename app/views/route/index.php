<?php
$title = "Route List";
ob_start();
?>

<div class="container mt-5">
    <h1>Route List</h1>

    <!-- Add a link to create a new route -->
    <a href="index.php?action=routecreate" class="btn btn-primary mb-3">Add New Route</a>

    <?php if (!empty($routes)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Departure City</th>
                    <th>Destination City</th>
                    <th>Distance</th>
                    <th>Duration</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($routes as $route): ?>
                    <tr>
                        <td>
                            <?= $route->getRouteID() ?>
                        </td>

                        <td>
                            <?= $route->getStartCityName() ?>
                        </td>
                        <td>
                            <?= $route->getEndCityName() ?>
                        </td>
                        <td>
                            <?= $route->getDistance() ?>
                        </td>
                        <td>
                            <?= $route->getDuration() ?>
                        </td>
                        <td>
                            <a href="index.php?action=routeedit&id=<?= $route->getRouteID() ?>" class="btn btn-warning">Edit</a>
                            <a href="index.php?action=routedelete&id=<?= $route->getRouteID() ?>"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center">No routes found.</p>
    <?php endif; ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>