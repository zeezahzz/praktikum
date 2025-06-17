<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penggajian";

$connection = new mysqli($servername, $username, $password, $dbname);
if ($connection->connect_error) {
    die("Gagal Koneksi". $mysqli_connect_error());
}