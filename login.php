<?php
require 'header.php';
?>
<main>
    <div class="form_control">
        <h1>LOGIN</h1>
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                echo '<p class="error">Empty Fields!</p>';
            } elseif ($_GET['error'] == "wrongpassword") {
                echo '<p class="error">Wrong password!</p>';
            } elseif ($_GET['error'] == "nouser") {
                echo '<p class="error">User does not exist!</p>';
            }
        }


        ?>
        <?php
        if (isset($_GET["newpwd"]))
            if ($_GET['newpwd'] == "passwordupdated") {
                echo '<p class="error">Your password has beed reset!</p>';
            }

        ?>

        <?php
        if (isset($_SESSION['id'])) {
            header("Location: ../index.php");
        } else {
            echo '   <form action="includes/login.inc.php" method="POST" class="form_control_login">
    <input type="text" name="mailuid" placeholder="username/email">
    <input type="password" name="pwd" placeholder="password">
    <button type="submit" name="login_submit"> Login</button>
</form>';
            echo ' <div class="c">
<p><a href="resetpassword.php"> Forgot your password</a></p>
</div>';
        }
        echo ' <div class="c">
<p><a href="signup.php"> Already have an account!</a></p>
</div>';

        ?>

    </div>

</main>
<?php
require 'footer.php';
?>