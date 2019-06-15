<?php

define('BASE_PATH','http://192.168.10.10');
define('DB_HOST', '192.168.10.10');
define('DB_NAME', 'INT1000');
define('DB_USER','homestead');
define('DB_PASSWORD','secret');

$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to database server: ");
?>