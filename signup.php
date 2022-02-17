<?php
require "header.php";
?>

<main>
    <div class="wrapper-main">
        <section class="section-default">
            <h1>SIGN UP</h1>
            <form action="includes/signup.inc.php" method="POST"></form>
            <input type="text" name="uid" placeholder="username">
            <input type="email" name="mail" placeholder="E-mail">
            <input type="password" name="pwd" placeholder="password">
            <input type="password" name="pwd-repeat" placeholder="Repeat password">
            <button type="submit" name="signup_submit"> Sign Up</button>

        </section>
    </div>

</main>
<?php
require "footer.php"
?>