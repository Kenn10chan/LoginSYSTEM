<?php

require "header.php";
require 'includes/dbh.inc.php';


?>

<head>


</head>

<main>
    <?php
    $sql = "SELECT* FROM users ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];

            // echo "<p>" . $row['username'] . "</p>";
            $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
            $resultImg = mysqli_query($conn, $sqlImg);

            while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                echo "<div>";
                if ($rowImg['status'] == 0) {
                    echo "<img src='uploads/profile" . $id . ".png?'" . mt_rand() . " >";
                } else {
                    echo "<img src='uploads/profiledefault.png.png'>";
                }
                echo "<p>" . $row['uidusers'] . "</p>";

                echo "</div>";
            }
        }
    } else {
        echo "There are no users signed up yet!";
    }




    if (isset($_SESSION['userId'])) {
        if ($row['user'] == "ADMIN") {

            echo "You are logged in as ADMIN. ";
            echo  " <form action='profile.php' class='post' method='POST' enctype='multipart/form-data'>
            <label for='profileImage'> Profile Image</label>
            <input type='file' name='file' id='profileImage'>

        <button type='submit' name='submit' class='btn btn-primary btn-block'>Save user</button>

</form>";
        } elseif ($row['user'] == "user") {
            echo "You are logged in as User. ";
            echo
            " <form action='profile.php' class='post' method='POST' enctype='multipart/form-data'>
                         <label for='profileImage'> Profile Image</label>
                         <input type='file' name='file' id='profileImage'>
            
                     <button type='submit' name='submit' class='btn btn-primary btn-block'>Save user</button>
            
             </form>";
        }
    } else {
        // echo '<p>You are logged out !</p>';
    }


    ?>




</main>
<?php
require "footer.php"
?>