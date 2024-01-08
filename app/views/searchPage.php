<!-- app/views/searchPage.php -->
<?php
$title = "Search Results";
ob_start();
?>

<form id="filterForm" action="index.php?action=filterPage" method="post">
    <select class="form-control" name="Company" id="Company">
        <!-- Add an option to show all schedules -->
        <option value="">Show All Schedules</option>

        <!-- Populate with dynamic data from your database -->
        <?php foreach ($availableSchedules as $schedule): ?>
            <option value="<?= $schedule->getBusID()->getCompany()->getCompanyID() ?>">
                <?= $schedule->getBusID()->getCompany()->getCompanyName() ?>
            </option>
        <?php endforeach; ?>
    </select>
    <div class="form-group">
        <label for="Price">Price:</label>
        <input type="number" class="form-control" name="Price" id="Price" min="1">
    </div>
    <!-- Add a new dropdown for Time of Day -->
    <div class="form-group">
        <label for="TimeOfDay">Time of Day:</label>
        <select class="form-control" name="TimeOfDay" id="TimeOfDay">
            <option value="">Any Time</option>
            <option value="morning">Morning</option>
            <option value="evening">Evening</option>
            <option value="night">Night</option>
        </select>
    </div>
    <button type="button" class="btn btn-primary" id="filterButton">Filter</button>
</form>
<div id="filteredResults">
    <!-- Div to display filtered results -->
    <div class="container mt-5">
        <?php if (!empty($availableSchedules)): ?>
            <div class="row">
                <?php foreach ($availableSchedules as $schedule): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <?php
                            $companyID = $schedule->getCompanyID();
                            $companyImage = $schedule->getCompanyImageByID($companyID);
                            ?>
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <?php if (!empty($companyImage)): ?>
                                        <img src="<?= $schedule->getBusID()->getCompany()->getCompanyImage() ?>" class="card-img"
                                            alt="<?= $schedule->getBusID()->getCompany()->getCompanyImage() ?>c:\xampp\htdocs\BRIF999\imgs">
                                    <?php else: ?>
                                        <!-- Default image or placeholder if no image is available -->
                                        <img src="default_image.jpg" class="card-img" alt="Default Image">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Schedule ID:
                                            <?= $schedule->getScheduleID() ?>
                                        </h5>
                                        <p class="card-text">Date:
                                            <?= $schedule->getDate() ?>
                                        </p>
                                        <p class="card-text">Departure Time:
                                            <?= $schedule->getDepartureTime() ?>
                                        </p>
                                        <p class="card-text">Arrival Time:
                                            <?= $schedule->getArrivalTime() ?>
                                        </p>
                                        <p class="card-text">Available Seats:
                                            <?= $schedule->getAvailableSeats() ?>
                                        </p>
                                        <p class="card-text">Company:
                                            <?= $schedule->getBusID()->getCompany()->getCompanyName() ?>
                                        </p>
                                        <p class="card-text">Price:
                                            <?= $schedule->getPrice() ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center">No available schedules found for the selected route and date.</p>
        <?php endif; ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#filterButton').on('click', function () {
            // Serialize the form data
            var formData = $('#filterForm').serialize();

            // Make an Ajax request
            $.ajax({
                type: 'POST',
                url: 'index.php?action=filterPage',
                data: formData,
                success: function (data) {
                    // Replace the content of the div with the received data
                    $('#filteredResults').html(data);
                },
                error: function (xhr, status, error) {
                    // Log any errors to the console for debugging
                    console.error(xhr.responseText);
                }
            });
        });

        // Reset company filter when "Show All Schedules" is selected
        $('#departureCity').on('change', function () {
            if ($(this).val() === "") {
                // Make an Ajax request to get all schedules without company filter
                $.ajax({
                    type: 'POST',
                    url: 'index.php?action=filterPage', // Update the URL to your actual endpoint
                    data: {
                        companyFilter: ''
                    },
                    success: function (data) {
                        // Replace the content of the div with the received data
                        $('#filteredResults').html(data);
                    },
                    error: function (xhr, status, error) {
                        // Log any errors to the console for debugging
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>

<?php $content = ob_get_clean(); ?>
<?php include_once 'app/views/include/layout.php'; ?>