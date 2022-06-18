<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>

body,html {
    background-image: url('https://i.imgur.com/xhiRfL6.jpg');
    height: 100%;
}

#profile-img {
    height:100px;
}
.h-80 {
    height: 50% !important;
}
</style>

<body style="background-color:black; color:white;" data-spy="scroll" data-target="#myScrollspy" data-offset="1">
<div class="text-center">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to House4Rent...</h1>
  <div>      
   <div class="text-right"><h1 style="padding-right:50px;">
                   <a href="welcome.php" class="btn btn">Home</a>

           <a href="post.php" class="btn btn">Create Post</a>
              <a href="resetpassword.php" class="btn btn">Reset Password</a>
                  <a href="logout.php" class="btn btn">Sign Out</a> 
</div></h1></div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <header class="page header text-"><h1 style="padding-left:10px;"></h1></header>
</head>

<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Menu
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
     <a class="dropdown-btn" href="owner.php">Owner Registration</a>
      <a class="dropdown-btn" href="tenant.php">Tenant Registration</a>
          <a class="dropdown-btn"  href="google.html">Google Map</a></br>
             <a class="dropdown-btn" href="commentsystem.php">Conversation Box</a>

  </div>
</div>

</body>
</html> 