<?php
if (isset($_POST['login-submit'])) {


    require 'dbh.inc.php';
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];
    if (empty($mailuid) || empty($pwd)) {
        header("location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE uidusers=? OR emailusers =?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($result);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdusers']);
                if ($pwdCheck == false) {
                    header("location: ../index.php?error=wrongpassword");
                    exit();
                } elseif ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['iduser'];
                    $_SESSION['userUid'] = $row['uiduser'];
                    header("location: ../index.php?error=success");
                    exit();
                }
            } else {
                header("location: ../index.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("location: ../index.php");
    exit();
}
