<?php
require "../db.php";

$date = $_GET['rent-income-date'];

$utcDate = new MongoDB\BSON\UTCDateTime(strtotime($date . ' ' . '12:00') * 1000);

$cursor = $db->rent->aggregate([
    [
        '$match' => ['end_date' => ['$lte' => $utcDate]],
    ],
    [
        '$group' => ['_id' => null, 'total' => ['$sum' => '$rent_income_uah']]
    ]
]);

$result = iterator_to_array($cursor);

echo "<h2>Total rent income by $date</h2>";

foreach ($result as $key => $value) {
    $total = $value['total'];
    echo "<p>$total UAH</p>";
}