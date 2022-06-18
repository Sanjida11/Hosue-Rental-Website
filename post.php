<?php
  // Create database connection
require_once "config.php";

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $image_text = mysqli_real_escape_string($link, $_POST['image_text']);

    // image file directory
    $target = "images/".basename($image);

    

    $sql = "INSERT INTO post (image, image_text) VALUES ('$image', '$image_text')";
    // execute query
    mysqli_query($link, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
  }
  $result = mysqli_query($link, "SELECT * FROM post");
?>
<!DOCTYPE html>
<html>
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <meta charset="UTF-8">

<title>Post & Image upload</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

           <link rel="stylesheet" type="text/css" href="post.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
   #content{
    width: 80%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
   }
   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    width: 80%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
   }
</style>
</head>
<body style="background-color:black; color:white;">
    <div class="container">
    <div class="d-flex justify-content-center h-300">
                <div class="card">

            <div class="card-header">
    <div class="wrapper">  
<div id="content">

  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
        echo "<img src='images/".$row['image']."' >";
        echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
                      <div class="card-body">

  <form method="POST" action="post.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file"  name="image" >
    </div>
    <div>
      <textarea 
              style="color:black;

        id="text" 
        cols="40" 
        rows="4" 
        name="image_text" 
        placeholder="Say Details about this House..."></textarea>
    </div>

    <div>
           <input type="hidden" name="comment_id" id="comment_id" value="0" />
              <button type="submit"  class="btn btn-primary" name="upload">POST</button>
                 <input type="reset" class="btn btn-default" value="Reset">
                     <input type="button" class="btn btn-danger" value="Cancel" onclick="history.back()">

                </div>

    </div>
  </form>
</div>
</body>
</html>

