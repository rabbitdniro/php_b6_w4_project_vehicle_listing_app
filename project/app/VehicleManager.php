<?php

require_once "FileHandler.php";
require_once "VehicleBase.php";
require_once "VehicleActions.php";

// VehicleManager class

class VehicleManager extends VehicleBase implements VehicleActions {
    // uses FileHandler traits
    use FileHandler;

    // Method to add vehicle to json file
    public function addVehicle($data) {
        $vehicles = $this->read_from_file();
        $vehicles[] = $data;
        $this->write_to_file($vehicles);
    }

    // Method to edit a vehicle info in json file
    public function editVehicle($id, $data) {
        $vehicles = $this->read_from_file();

        if (isset($vehicles[$id])) {
            $vehicles[$id] = $data;
            $this->write_to_file($vehicles);
        }
    }

    // Method to delete a vehicle from json file
    public function deleteVehicle($id) {
        $vehicles = $this->read_from_file();

        if (isset($vehicles[$id])) {
            unset($vehicles[$id]);
            $this->write_to_file(array_values($vehicles));
        }
    }

    // Method to get all the vehicles from the json file
    public function getVehicles() {
        return $this->read_from_file();
    }

    // Method to get details of a vehicle from the json file
    public function getDetails() {
        return [
            "name" => $this->name,
            "type" => $this->type,
            "price" => $this->price,
            "image" => $this->image,
        ];
    }
}


?>