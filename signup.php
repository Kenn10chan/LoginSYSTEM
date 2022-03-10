<?php
require "header.php";
// require_once "login.php";
?>

<main>
    <div class="wrapper_main">
        <section class="section_default">

            <h1>SIGN UP</h1>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class="error" > Fill all the fields </p>';
                } elseif ($_GET['error'] == "invaliduidmail") {
                    echo '<p  class="error"> Invalid username and password </p>';
                } elseif ($_GET['error'] == "invaliduid") {
                    echo '< class="error"> Invalid username </p>';
                } elseif ($_GET['error'] == "invalidmail") {
                    echo '<p class="error"> Invalid e-mail </p>';
                } elseif ($_GET['error'] == "passwordcheck") {
                    echo '<p class="error"> Your password does not match! </p>';
                } elseif ($_GET['error'] == "usernametaken") {
                    echo '<p class="error"> Username already in use! </p>';
                }
            }
            //elseif ($_GET['signup'] == "success") {
            //     echo '<p> Sign up succesful</p>';
            // }


            ?>

            <form action="includes/signup.inc.php" method="POST">
                <input type="text" name="uid" placeholder="username">
                <input type="email" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="password">
                <input type="password" name="pwd-repeat" placeholder="Repeat password">
                <button type="submit" name="signup_submit"> Sign Up</button>
            </form>
            <div class="b">
                <p><a href="login.php"> Already have an account.</a></p>
            </div>


        </section>

    </div>

</main>
<?php
require "footer.php"
?>