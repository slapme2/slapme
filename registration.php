<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php"); 
}

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $gender = $_POST["gender"];
  $address = $_POST["address"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM user_info WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO user_info VALUES('','$name', '$gender', '$address','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
      header("refresh:1;url=login.php");// it takes 1 sec to go login page
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
      header("refresh:1;url=registration.php");// it takes 1 sec to go registration page
        {
      
    }

    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration</title>
  </head>
  <body>
<style type="text/css">

  #text{

    height: 25px;
    border-radius:5px;
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
  
    background-color: #DCDCDC;
    margin:20px auto;
    width: 350px;
    padding: 20px;
    opacity: 0.90;
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


    
<div id="box">
<h2 style="color:black;" align = "center"> Create Account </h2><br><br>
    <form class="" action="" method="post" autocomplete="off">
      <label for="name">Name : </label> <br><br>
      <input type="text" name="name" id = "name" required value=""> <br><br>
      <label for="name">Gender : </label> <br><br>
      <input type="text" name="gender" id = "gender" required value=""> <br><br>
      <label for="name">Address : </label> <br><br>
      <input type="text" name="address" id = "address" required value=""> <br><br>
      <label for="username">Username : </label> <br><br>
      <input type="text" name="username" id = "username" required value=""> <br><br>
      <label for="email">Email : </label> <br><br>
      <input type="email" name="email" id = "email" required value=""> <br><br>
      <label for="password">Password : </label> <br><br>
      <input type="password" name="password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
 <br><br>
      <label for="confirmpassword">Confirm Password : </label> <br><br>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br><br>
      <button type="submit" name="submit">Register</button>
  

    </form>
    <br>
    <a href="login.php">Login</a>
  </body>
</html>
