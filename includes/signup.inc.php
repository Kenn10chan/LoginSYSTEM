<?php
if (isset($_POST['signup_submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];
    if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
        header("location: ../signup.php?error=emptyfields&uid=" . $username . "&mail=" . $email);
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("location: ../signup.php?error=invalidmailuid");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../signup.php?error=invaliduid&uid" . $username);
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("location: ../signup.php?error=invalidmail&mail=" . $email);
        exit();
    } elseif ($password !== $passwordRepeat) {
        header("location: ../signup.php?error=passwordcheck&uid=" . $username . "&mail=" . $email . $username);
        exit();
    } else {
        $sql = "SELECT uidusers FROM users WHERE uidusers=?"; //(? prepared=placeholder )statement here we are checking if the username exist
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                header("location: ../signup.php?error=usernametaken&mail=" . $email);
                exit();
            } else {
                $sql = "INSERT INTO users (uidusers, mailusers, pwdusers )
            values(?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                mysqli_stmt_prepare($stmt, $sql);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedpwd);
                    mysqli_stmt_execute($stmt);


                    $sql = "SELECT * FROM users where uidusers='$username';";
                    $result = mysqli_query($conn, $sql);


                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $userid = $row['id'];

                            $sql = "INSERT INTO profileimg(userid, status) 
                            VALUES ('$userid',1 )";
                            mysqli_stmt_prepare($stmt, $sql);
                            mysqli_stmt_execute($stmt);
                            $sql = "UPDATE  users SET institution='', attended='', course='', work='',experience='',country='',location='' ";

                            $result = mysqli_query($conn, $sql);


                            header("Location: ../index.php?signup=success");
                        }
                    }

                    // echo "<p>" . $row['id'] . "</p>";

                    // header("location: ../index.php?signup=success");
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("location: ../signup.php");
    exit();
}
