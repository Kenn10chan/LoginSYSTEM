<?php


$msg = "";

$conn = mysqli_connect('localhost', 'root', '', 'kennchan');

if (isset($_POST['save']) && isset($_FILES['profileImage'])) {

    echo "<pre";
    print_r($_FILES['profileImage']);
    echo "</pre";


    $bio = $_POST['bio'];
    $profileImageName = time() . '_' . $_FILES['profileImage']['name'];

    $target = 'uploads/' . $profileImageName;


    if (move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)) {
        $sql = "INSERT INTO user (profile_image,bio)
        VALUES ('$profileImageName', '$bio')";
        if (mysqli_query($conn, $sql)) {
            $msg = "image uploaded and saved to the database ";
            $css_class = "alert-success";
            header("Location: output.php");
        } else {
            echo "Database Error";
        }
    }
} else {
    $msg = "failed to upload";
}
