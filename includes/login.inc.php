<?php
if (isset($_POST['login_submit'])) {


    require 'dbh.inc.php';
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    if (empty($mailuid) || empty($password)) {
        header("location: ../login.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE uidusers=? OR mailusers =?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mail);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdusers']);
                if ($pwdCheck == false) {
                    header("location: ../login.php?error=wrongpassword");
                    exit();
                } elseif ($pwdCheck == true) {

                    session_start();
                    $_SESSION['id'] = $row['id'];


                    header("location: ../index.php?login=success");
                    exit();
                } else {
                    header("location: ../login.php?error=wrongpassword");
                    exit();
                }
            } else {
                header("location: ../login.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("location: ../login.php");
    exit();
}
