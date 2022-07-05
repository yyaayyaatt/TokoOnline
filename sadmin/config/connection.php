<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAMA', 'online_shop');
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAMA);
if ($conn === false) {
die("ERROR: Could not connect. " . mysqli_connect_error());
}
?> 
