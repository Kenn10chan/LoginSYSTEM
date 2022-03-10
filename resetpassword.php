<?php
require "header.php";
// require_once "login.php";
?>

<main>
    <div class="wrapper_main">
        <section class="section_default">

            <h1>Reset your password</h1>

            <?php
            if (isset($_GET['reset'])) {
                if ($_GET['reset'] == "success") {
                    echo '<p>Check Your e-mail</p>';
                }
            } else {
                echo '    <p>An email will be sent to your email with instructions on how to reset the password</p> 
                <form action="includes/reset.inc.php" method="POST">
                    <input type="text" name="email" placeholder="Enter your email address">
                    <button type="submit" name="reset_submit">Send to receive password</button>
                    
                    </form>';
            }


            ?>


        </section>

    </div>

</main>
<?php
require "footer.php"
?>