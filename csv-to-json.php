<?php

// Path to the CSV file
$csvFilePath = 'cities.csv';
// Open the CSV file for reading
$handle = fopen($csvFilePath, "r");

// Initialize an array to store the data
$data = [];

// Check if the file is not false
if ($handle !== FALSE) {
    // Skip the headers if your CSV file has them
    fgetcsv($handle, 1000, ",");

    // Loop through each row of the CSV file
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        // Create an associative array for each row
        $data[] = [
            "zip" => $row[0],
            "city" => $row[1],
            "country" => $row[2],
            "state" => "CA"
        ];
    }

    // Close the CSV file
    fclose($handle);
}

// Convert the array to JSON
$jsonData = json_encode($data, JSON_PRETTY_PRINT);

// Output the JSON data
echo $jsonData;

// Optionally, save the JSON data to a file
$jsonFilePath = 'cities.json';
file_put_contents($jsonFilePath, $jsonData);

?>
