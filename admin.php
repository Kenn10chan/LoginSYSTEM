<?php

require "header.php";
require 'includes/dbh.inc.php';


?>

<head>
    <style>
        .a {
            display: flex;
            list-style: none;
            flex-direction: column;
            width: 100%;
            height: 700px;
            /* background-color: #ff0; */
            margin: 2px 10px 10px 5px;
            padding: 10px;
        }

        .a form {
            display: flex;
            flex-direction: column;
            padding: 18px;
        }

        .b {
            max-width: 700px;
            height: auto;
            display: inline-flex;
        }

        .b label {
            max-width: 200px;
            width: 100%;
        }

        .b select {
            padding: 16px;
            margin: 2px;
            width: 100%;
        }

        .a form input {
            padding: 16px;
            margin: 2px;
            width: 100%;
        }



        .a button {
            margin: 1px;
            padding: 15px;
            width: 200px;
            height: 50px;
            margin-left: 300px;
            background-color: #0ff;
            color: #fff;
            border: 5px;
        }

        button:hover {
            background: #ff0;
            color: #111;
        }
    </style>

</head>

<main>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            echo '<p class="error">Empty Fields!</p>';
        }
    }
    if (isset($_GET['success'])) {
        if ($_GET['success'] == "saved") {
            echo '<p class="error">Profile information saved successiful!</p>';
        }
    }


    ?>

    <div class="a">
        <form action="includes/admin.inc.php" method="POST">
            <div class="b">
                <label> Institution </label>
                <select id="institution" name="institution">
                    <option value="1"> University</option>
                    <option value="2">college</option>
                </select>
            </div>
            <div class="b">
                <label> Institution attended</label>
                <input type="text" name="attended" placeholder="Institution attended">
            </div>

            <div class="b">
                <label> Course pursued</label>
                <input type="text" name="course" placeholder="Course">
            </div>
            <div class="b">
                <label> Work organization</label>
                <input type="text" name="work" placeholder="Work">
            </div>
            <div class="b">
                <label>Years of experience </label>
                <select id="experience" name="experience">
                    <option value="1"> 1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">Over 5 years</option>
                    <option value="7">over 10 years</option>
                    <option value="8">over 20 years</option>
                    <option value="9">over 30 years</option>
                    <option value="10">over 40 years</option>

                </select>
            </div>


            <div class="b">
                <label>Country</label>
                <select id="country" name="country">
                    <option value="1">Kenya</option>
                    <option value="2">Tanzania</option>
                    <option value="3">Uganda</option>
                    <option value="4">South Africa</option>
                    <option value="5"> Within Africa</option>
                    <option value="6">Outside Africa</option>
                </select>
            </div>
            <div class="b">
                <label> Location</label>
                <input type="text" name="location" id="location">
            </div>

            <button type="submit" name="save_profile"> Save profile</button>
            <button type="submit" name="edit_profile"> Edit profile</button>
            <button type="submit" name="delete_profile"> Delete profile</button>


        </form>

    </div>


</main>
<?php
require "footer.php"
?>