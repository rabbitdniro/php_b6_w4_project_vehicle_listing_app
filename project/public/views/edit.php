<?php

require_once "../../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager();

$id = $_GET['id'] ?? null;

if ($id === null) {
    header("Location: ../index.php");
    exit;
}

$vehicles = $vehicleManager->getVehicles();
$vehicleToEdit = $vehicles[$id] ?? null;

if (!$vehicleToEdit) {
    header("Location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST['name'], $_POST['type'], $_POST['price'], $_POST['image'])) {
        // Adds data to the json file
        $vehicleManager->editVehicle($id, [
            "name" => $_POST['name'],
            "type" => $_POST['type'],
            "price" => $_POST['price'],
            "image" => $_POST['image'],
        ]);

        header("Location: ../index.php");
        exit;
    }
}

include "header.php";
?>

<div class="container">
    <div class="card mt-5 mx-auto" style="width: 50rem;">
        <div class="card-header text-center">
            <h5>Edit Vehicle Details</h5>
        </div>

        <div class="card-body">
            <form action="" method="POST" class="form-control">
                <div class="mb-3">
                    <label for="name" class="form-label">Vehicle Name:</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($vehicleToEdit['name']) ?>" class="form-control" id="name" placeholder="Your Vehicle" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Vehicle Type:</label>
                    <input type="text" name="type" value="<?= htmlspecialchars($vehicleToEdit['type']) ?>" class="form-control" id="type" placeholder="Vehicle Type" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Vehicle Price:</label>
                    <input type="text" name="price" value="<?= htmlspecialchars($vehicleToEdit['price']) ?>" class="form-control" id="price" placeholder="Vehicle Price" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Vehicle Image URL:</label>
                    <input type="text" name="image" value="<?= htmlspecialchars($vehicleToEdit['image']) ?>" class="form-control" id="image" placeholder="Vehicle Image" required>
                </div>
                
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="../index.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>