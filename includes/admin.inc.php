<?php

require 'dbh.inc.php';


if (isset($_POST['save_profile'])) {


    $institution = $_POST['institution'];
    $attended = $_POST['attended'];
    $course = $_POST['course'];
    $work = $_POST['work'];
    $experience = $_POST['experience'];
    $country = $_POST['country'];
    $location = $_POST['location'];

    if (empty($institution) || empty($course) || empty($work) || empty($location)) {
        header("location: ../admin.php?error=emptyfields");
        exit();
    } else {


        $sql = "UPDATE  users SET institution='$institution',attended='$attended',course='$course',work='$work',experience='$experience',country='$country',location='$location'";
        $result = mysqli_query($conn, $sql);
        header("location: ../admin.php?success=saved");
        exit();
    }
}
