<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kennchan || Submission</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <header>
        <nav class="nav_header">
            <a href="#" class="header_logo"> <img src="/images/logoo.png" alt=""></a>
            <ul>
                <li> <a href="index.php">HOME</a></li>
                <li> <a href="#">ABOUT</a> </li>
                <li> <a href="#">PORTFOLIO</a> </li>
                <li> <a href="#">BLOG</a> </li>
                <li> <a href="#">CONTACTS</a> </li>

            </ul>
            <div class="header_login">




                <form action="include/login.php" method="POST" class="form_control_login">
                    <input type="text" name="mailuid" placeholder="username/email">
                    <input type="password" name="pwd" placeholder="password">
                    <button type="submit" name="login_submit"> Login</button>
                </form>


                <div class="icon">
                    <a href="signup.php" class="sign_up"> Sign up</a>
                    <a href="signup.php" class="sign_up"><i class="fas fa-arrow-right"></i></a>
                </div>
                <div class="form_control_logout">
                    <form action="includes/logout.inc.php" method="POST">
                        <button type="submit" name="logout-submit"> Logout </button>
                    </form>
                </div>
            </div>









        </nav>
    </header>

</body>

</html>