<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div id="income">
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

echo "<h2 id='date'>Total rent income by $date</h2>";

foreach ($result as $key => $value) {
    $total = $value['total'];
    echo "<p>$total UAH</p>";
}
?>
</div>
<script>
    const block = document.getElementById("income");
    const headerValue = block?.getElementsByTagName("h2")[0].innerHTML.split("by")[1].trim();
    const parValue = block?.getElementsByTagName("p")[0].innerHTML;

    localStorage.setItem("incomeByDate", `${headerValue}: ${parValue}`);
</script>
</body>
</html>