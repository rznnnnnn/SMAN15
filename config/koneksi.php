<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "spka";

$konek = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$konek) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>