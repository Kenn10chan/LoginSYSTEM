<?php
if (isset($_POST['reset_submit'])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "www.navigation.com/forgottenpwd/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require 'dbh.inc.php';

    $userEmail = $_POST['email'];

    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }
    $sql = "INSERT INTO pwdreset (pwdResetEmail,pwdResetSelector,pwdResetToken, pwdResetExpires)
    VALUES (?,?,?,?); ";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
        exit();
    } else {
        $hashedPwd = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedPwd, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;
    $subject = 'Reset your password for chan website';
    $message = '<p> We received your password request. The link to reset is attached below. If you didnt make this request ignore. </p>';

    $message .= ' <p> Here is your password reset link : </br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $header = "From : Kennchan <kennchanngatz53@gmail.com>\r\n";
    $header .= "Reply : Kennchan <kennchanngatz53@gmail.com>\r\n";
    $header .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $header);

    header("Location:../resetpassword.php?reset=success");
} else {
    header("Location: ../index.php");
    exit;
}
