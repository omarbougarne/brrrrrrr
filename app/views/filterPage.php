<div class="container mt-5">
    <?php if (!empty($cm)): ?>
        <div class="row">
            <?php foreach ($cm as $schedule): ?>
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
                                        alt="Company Image">
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