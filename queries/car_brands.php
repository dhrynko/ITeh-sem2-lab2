<?php
require "../db.php";

$cursor = $db->cars->distinct('brand', []);

echo "<h2>Available car brands</h2>";

foreach ($cursor as $key => $value) {
    echo "<li>$value</li>";
}