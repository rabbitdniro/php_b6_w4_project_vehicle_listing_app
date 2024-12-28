<?php

// FileHandler Trait to read and write data to file

trait FileHandler {
    // Filepath property
    private $file_path = __DIR__ . "/../data/vehicles.json";

    // Method to read data from file
    public function read_from_file() {
        if (!file_exists($this->file_path)) {
            file_put_contents($this->file_path, json_encode([]));
        }

        return json_decode(file_get_contents($this->file_path), true);
    }

    // Method to write data to file
    public function write_to_file($data) {
        file_put_contents($this->file_path, json_encode($data, JSON_PRETTY_PRINT));
    }
}


?>