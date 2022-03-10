<?php

require "header.php";
require 'includes/dbh.inc.php';


?>

<head>
    <!-- <link rel="stylesheet" href="upload.css"> -->
    <style>
        img {
            width: 100px;
            height: auto;
            box-sizing: border-box;
            border-radius: 50%;

        }

        .d {
            text-align: center;
            justify-content: center;
        }

        .d li {
            list-style: none;
            margin-left: 10px;
        }

        .d a {
            text-decoration: none;
            color: #fff;
            padding: 12px;
        }

        */
    </style>

</head>

<main>
    <?php
    if (isset($_SESSION['id'])) {
        if ($_SESSION['id'] === $row['id']) {
            echo "<div class ='d'>";
            echo " <ul>
    <li><a href='admin.php' style='font-size: 24px;  font-weight: 600;'>Profile</a></li>
    </ul>";


            echo "</div>";
        } elseif ($_SESSION['id']) {
            echo "<div class ='d'>";
            echo " <ul>
<li><a href='admin.php' style='font-size: 24px;  font-weight: 600;'>Profile</a></li>
</ul>";


            echo "</div>";
        }
    }

    echo "<div class='container'>";
    $sql = "SELECT id,uidusers,attended,course,work,location FROM users ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];

            // echo "<p>" . $row['username'] . "</p>";
            $sqlImg = "SELECT * FROM profileimg WHERE userid='$id'";
            $resultImg = mysqli_query($conn, $sqlImg);

            while ($rowImg = mysqli_fetch_assoc($resultImg)) {
                echo "<div class='container'>";
                if ($rowImg['status'] == 0) {
                    echo "<img src='uploads/profile" . $id . ".jpg?" . mt_rand() . "'>";
                } else {
                    echo "<img src='uploads/profiledefault.png.png'>";
                }
                echo "<p>" . $row['uidusers'] . "</p>";
                echo "<p>" . $row['attended'] . "</p>";
                echo "<p>" . $row['course'] . "</p>";
                echo "<p>" . $row['work'] . "</p>";
                echo "<p>" . $row['location'] . "</p>";


                echo "</div>";
            }
        }
    }
    echo "<div class='row'>";
    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        echo "You are logged in as ADMIN";
        echo "<div>";
        echo " <form action='profile.php' class='post' method='POST' enctype='multipart/form-data'>
                     <label for='profileImage'> Profile Image</label>
                     <input type='file' name='file' id='profileImage'>
        
                 <button type='submit' name='submit' class='btn btn-primary btn-block'>Save user</button>
        
         </form>";
        // echo "</div>";

        // echo "<div>";
        // echo " <form action='profile.php' class='post' method='POST' enctype='multipart/form-data'>
        //              <label for='profileImage'> Profile Image</label>
        //              <input type='file' name='file' id='profileImage'>

        //          <button type='submit' name='submit' class='btn btn-primary btn-block'>Save user</button>

        //  </form>";
        // echo "<button type='submit' name='delete'> Delete</button>";
        // echo "</div>";
    } else {
        echo "There are no users logged in yet!";
    }

    // echo "</div>";
    // $sql = "SELECT* FROM users";
    // $result = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($result) > 0) {

    //     while ($row = mysqli_fetch_array($result)) {
    //         $id = $row['id'];


    //         $sqlbio = "SELECT * FROM bio WHERE id='$id'";
    //         $resultbio = mysqli_query($conn, $sqlbio);

    //         while ($rowbio = mysqli_fetch_array($resultbio)) {
    //             if ($rowbio['id'] == $id) {
    //                 echo "<div class='container'>";
    //                 echo "<p>" . $rowbio['attended'] . "</p>";
    //                 echo "<p>" . $rowbio['course'] . "</p>";
    //                 echo "<p>" . $rowbio['work'] . "</p>";
    //                 echo "<p>" . $rowbio['location'] . "</p>";
    //             }
    //         }
    //     }
    // } else {
    //     echo 'error';
    // }

    echo "</div>";
    ?>

</main>
<?php
require "footer.php"
?>