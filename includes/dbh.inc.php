<?php
$servername = "localhost";
$dBuserName = "root";
$dBPassword = "";
$dBName = "kennchan";
$conn = mysqli_connect($servername, $dBuserName, $dBPassword, $dBName);
if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
}
