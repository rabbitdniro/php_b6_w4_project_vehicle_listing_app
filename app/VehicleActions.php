<?php

// VehicleActions interface to ensure the following methods are implemented

interface VehicleActions {
    public function addVehicle($data);
    public function editVehicle($id, $data);
    public function deleteVehicle($id);
    public function getVehicles();
}

?>