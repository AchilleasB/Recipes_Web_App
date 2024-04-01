<?php
// $servername = "mysql";
// $username = "root";
// $password = "secret123";
// $database = "web_recipes";
// ?>

$servername = getenv('DB_SERVERNAME');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');
