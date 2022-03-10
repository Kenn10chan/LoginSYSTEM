<head>
    <link rel="stylesheet" href="upload.css">
</head>


<?php
require 'header.php';

?>
<main>
    <?php
    echo '<h1>CHOOSE A PHOTO</h1>


 <div class="form-div">
     <form action="upload.php" class="post" method="POST" enctype="multipart/form-data">
         <div class="form-group1">
             <!-- <a href=""><img src="uploads/profiledefault.png" id="profileDisplay"></a> -->
             <label for="profileImage"> Profile Image</label>
             <input type="file" name="profileImage" id="profileImage">
         </div>
         <div class="form-group">
             <label for="bio">BIO</label>
             <textarea name="bio" id="bio" class="form-control"></textarea>
         </div>
         <div>
             <button type="submit" name="save" class="btn btn-primary btn-block">Save user</button>
         </div>
     </form>
 </div>';
    ?>

</main>
<?php
require 'footer.php';
?>