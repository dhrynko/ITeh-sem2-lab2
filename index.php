<?php
require "db.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/style.css">
    <title>Car Rent MongoDB</title>
</head>
<body>
<div class="block">
    <div>
        <h1>Rent Income By Date</h1>
        <p>Choose date</p>
    </div>
    <form action="queries/rent_income.php">
        <input name="rent-income-date" type="date" value="2014-08-12" min="2014-01-11" max="2021-12-31">
        <input type="submit" value="Show">
    </form>
    <br>
    <br>
    <div>
        <h1>Cars with specified mileage</h1>
        <p>(Less or equal)</p>
        <p>Input mileage</p>
    </div>
    <form action="queries/cars_with_mileage.php">
        <input type="text" value="0" name="mileage">
        <input type="submit" value="Show">
    </form>
    <br>
    <br>
    <div class="block">
        <div>
            <h1>Available car brands</h1>
            <div>
                <form action="queries/car_brands.php">
                    <input name="brands" type="submit" value="Show">
                </form>
            </div>
        </div>
        <br>
        <br>
    </div>
</div>
<div></div>
</body>
</html>


