<?php
if (isset($_POST['reset_password_submit'])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];
    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../create-new-password.php?newpwd=empty");
        exit();
    } elseif ($password !== $passwordRepeat) {
        header("Location: ../create-new-password.php?newpwd=pwdntsame");
        exit();
    }


    $currentDate = date("u");

    require  'dbh.inc.php';

    $sql = "SELECT *FROM pwdreset WHERE pwdResetSelector=? AND pwdResetExpires >=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $selector);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            echo "You need to submit your reset  request";
            exit();
        } else {

            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false) {

                echo "You need re-submit your reset request";
                exit();
            } elseif ($tokenCheck === true) {

                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE mailusers=?; ";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error";
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);

                    $result = mysqli_stmt_get_result($stmt);
                    if ($row = mysqli_fetch_assoc($result)) {
                        echo "There was an error";
                        exit();
                    } else {

                        $sql = "UPDATE users SET pwdusers =? WHERE emailusers=?";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error";
                            exit();
                        } else {
                            $hashedpwds = password_hash($password, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt, "ss", $hashedpwds, $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($conn);

                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                echo "There was an error";
                                exit();
                            } else {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: ../login.php?newpwd=passwordupdated");
                                exit();
                            }
                        }
                    }
                }
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
