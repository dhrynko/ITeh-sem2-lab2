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
<div id="cars-block">
    <?php
    require "../db.php";

    $cursor = $db->cars->distinct('brand', []);

    echo "<h2>Available car brands</h2>";
    foreach ($cursor as $key => $value) {
        echo "<li>$value</li>";
    }
    ?>
</div>
</body>
<script>
    const listValues = Array.from(document.getElementById("cars-block")?.getElementsByTagName("li"));
    const brands = listValues.reduce((acc, {innerHTML}) => acc + `${innerHTML}, `, '').slice(0, -2);

    localStorage.setItem("brands", brands);
</script>
</html>