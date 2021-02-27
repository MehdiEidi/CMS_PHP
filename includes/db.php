<?php
////This is the easiest way to connect to the database but there is a better way implemented below this one.
//$connection = mysqli_connect("localhost", "root", "", "cms");
//
//if ($connection) {
//    echo "we are connected to db";
//}

//This way is a more secure way.
//We should keep the connection parameters in constants. In this way we can modify the values easily.
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'cms');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$connection) {
    echo "Couldn't connect to db " . mysqli_error($connection);
}
