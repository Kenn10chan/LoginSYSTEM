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
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <header>
        <nav class="nav_header">
            <a href="#" class="header_logo"> <img src="images/logoo.png" alt=""></a>
            <ul>
                <li> <a href="index.php">HOME</a></li>
                <li> <a href="output.php">ABOUT</a> </li>
                <li> <a href="#">PORTFOLIO</a> </li>
                <li> <a href="#">BLOG</a> </li>
                <li> <a href="#">CONTACTS</a> </li>

            </ul>
            <div class="header_login">

                <?php
                if (isset($_SESSION['id'])) {
                    if ($_SESSION['id'] === $row['id']) {

                        echo '  <div class="form_control_logout">
                        <form action="includes/logout.inc.php" method="POST">
                            <button type="submit" name="logout_submit"> Logout </button>
                        </form>
                    </div>';
                    }
                } else {


                    echo ' <a href="login.php" class="login"> Login </a>

                    <a href="signup.php" class="sign_up"> Sign up</a>
                    <!-- <a href="signup.php" class="sign_up"><i class="fas fa-arrow-right"></i></a> -->';
                }

                ?>


            </div>

        </nav>
    </header>

</body>

</html>