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
<div id="mileage-block">
    <?php
    require "../db.php";

    $mileage = $_GET['mileage'];

    $cursor = $db->cars->find([
        'mileage' => ['$lte' => intval($mileage)]
    ]);
    $result = iterator_to_array($cursor);

    echo "<h2>Accepted cars</h2>";
    echo "<p id='mileage'>Required mileage: $mileage or less</p>";

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
    ?>
</div>
</body>
<script>
    const parValues = Array.from(document.getElementById("mileage-block")?.getElementsByTagName("p"));

    const cars = parValues.reduce((acc, {innerHTML}, idx) => idx % 2 !== 0
        ? acc + `${innerHTML}, `
        : acc, '').slice(0, -2);

    localStorage.setItem("carsWithSpecifiedMileage", cars);
    localStorage.setItem("requiredMileage", document.getElementById("mileage").innerHTML);
</script>
</html>
