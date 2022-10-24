<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM user_info WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Index</title>
  </head>
  <body>
      <style type="text/css">

  #text{

    height: 25px;
    border-radius: 5px;
    padding: 4px;
    border: solid thin #aaa;
    width: 100%;
  }

  #button{

    padding: 10px;
    width: 100px;
    color: white;
    background-color: black;
    border: none;
  }

  #box{
    
    background-color: white;
    margin:50px auto;
    width: 380px;
    padding: 20px;
    opacity: 0.75;
  }

  body  {
   background-image: url("luffyacesabo.jpg");
   margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url(luffyacesabo.jpg) no-repeat;
  background-size: cover;
  }

  </style>



    <h1 style="color:black;" align = "center">Welcome <?php echo $row["name"]; ?></h1>
    <a href="logout.php">Logout</a>
  </body>
</html>
