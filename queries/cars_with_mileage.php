<?php
require "../db.php";

$mileage = $_GET['mileage'];

$cursor = $db->cars->find([
    'mileage' => ['$lte' => intval($mileage)]
]);
$result = iterator_to_array($cursor);

echo "<h2>Accepted cars</h2>";

foreach ($result as $key => $value) {
    $carId = $value['_id'];
    $brand = $value['brand'];
    $model = $value['model'];
    $manufactureYear = $value['manufacture_year'];
    $mileage = $value['mileage'];
    echo "<li style='font-weight: bold'>id: $carId</li>";
    echo "<p>$brand $model $manufactureYear</p>";
    echo "<p>Mileage: $mileage</p>";
}