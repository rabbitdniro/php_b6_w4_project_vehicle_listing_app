<?php

require_once "../../app/VehicleManager.php";

$vehicleManager = new VehicleManager();

$id = $_GET['id'] ?? "";

if ($id === null) {
    header("Location: ../index.php");
    exit;
}

$vehicles = $vehicleManager->getVehicles();
$vehicleToDelete = $vehicles[$id] ?? null;

if (!$vehicleToDelete) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['confirm']) && $_POST['confirm'] === "yes") {
        $vehicleManager->deleteVehicle($id);
    }

    header("Location: ../index.php");
    exit;
}

include "header.php";
?>

<div class="container">
    <div class="card text-center mt-5 mx-auto" style="width: 30rem;">
        <div class="card-header">
            <h5>Delete Vehicle</h5>
        </div>
        
        <div class="card-body">
            <div class="mb-3">
                <p>Are you sure you want to delete this vehicle?</p>
            </div>
            <form action="" method="POST">
                <div class="mb-3">
                    <button name="confirm" value="yes" class="btn btn-danger">Yes, Delete</button>
                    <a href="../index.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>