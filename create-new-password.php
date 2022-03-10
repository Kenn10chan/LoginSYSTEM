<?php
require "header.php";
// require_once "login.php";
?>

<main>
    <div class="wrapper_main">
        <section class="section_default">

            <?php

            $selector = $_GET["selector"];
            $validator = $_GET["validator"];
            if (empty($selector) || empty($validator)) {
                echo "could not validate your request!";
            } else {
                if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
            ?>
                    <form action="includes/resetpassword.inc.php" method="POST">
                        <input type="hidden" name="selector" value="<?php echo $selector ?>">
                        <input type="hidden" name="validator" value="<?php echo $validator ?>">
                        <input type="password" name="pwd" placeholder="Enter new password">
                        <input type="password" name="pwd-repeat" placeholder="Repeat new password">
                        <button type="submit" name="reset_password_submit"> Click to reset</button>
                    </form>


            <?php

                }
            }

            ?>

        </section>

    </div>

</main>
<?php
require "footer.php"
?>