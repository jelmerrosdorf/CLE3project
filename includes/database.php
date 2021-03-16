<?php
// host = server, $name = gebruikersnaam
$host = "localhost";
$name = "root";
$password = "";
$database = "users";


$db = mysqli_connect($host, $name, $password, $database)
or die("mysql connection failure:" . mysqli_connect_error());
