<?php

require_once "../app/VehicleManager.php";

$vehicleManager = new VehicleManager();
$vehicles = $vehicleManager->getVehicles();

include "views/header.php";
?>



<body>
    <div class="container">
        
        <div class="row mt-5">
            <hr>
            <div class="card text-center" style="border: none;">
                <div class="card-body">
                    <h5 class="card-title mb-5">Add Your Vehicles Here...</h5>
                    
                    <a href="./views/add.php" class="btn btn-success">Add Vehicle</a>
                </div>
            </div>
        </div>

        <hr>

        <div class="row my-5">
            <!-- Loops through vehicles to show data -->
            <?php foreach ($vehicles as $id=>$vehicle): ?>
                <div class="col">
                    <div class="card mb-5" style="width: 20rem;">
                        <img src="<?= $vehicle['image'] ?>" class="card-img-top" alt="<?= $vehicle['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $vehicle['name'] ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Name: <?= $vehicle['name'] ?></li>
                            <li class="list-group-item">Type: <?= $vehicle['type'] ?></li>
                            <li class="list-group-item">Price: $ <?= $vehicle['price'] ?></li>
                        </ul>
                        <div class="card-body">
                            <a href="./views/edit.php?id=<?= $id ?>" class="btn btn-primary">Edit</a>
                            <a href="./views/delete.php?id=<?= $id ?>" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- Ends Loops -->
        </div>
    </div>

</body>
</html>