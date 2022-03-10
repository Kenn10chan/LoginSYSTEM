<?php
require 'header.php'
?>

<head>

    <title>image preview</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            min-height: 100vh;
        }

        .alb {
            width: 200px;
            height: 200px;
            padding: 5px;
        }

        .alb img {
            width: 100%;
            height: auto;


        }

        a {

            color: #fff;
        }

        .pl {
            box-sizing: border-box;
            width: 150px;
            height: 70px;
            margin-left: 150px;
            margin-right: 150px;
            padding: 6px;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
        }
    </style>

</head>

<body>
    <div class="pl">
        <h1 style="color: #fff;">PHOTOS</h1>
        <a href="about.php">Upload more images</a>
    </div>

    <?php

    $conn = mysqli_connect('localhost', 'root', '', 'kennchan');

    $sql = "SELECT * FROM user ORDER BY id DESC";
    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0) {
        while ($images = mysqli_fetch_array($res)) {
            echo " <div class='alb'>";
            echo "  <img src='uploads/" . $images['profile_image'] . "'>";
            echo "<p>" . $images['bio'] . "</p>";
            echo " </div>";
        }
    } ?>



</body>