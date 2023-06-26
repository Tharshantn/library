<?php session_start(); 
include "database.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>library</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="library.png">
</head>
<body>
<div class="image">
<img src="library.jpg" alt="image">
    </div>
    <div id="container">
        <div id="header">
            <h1>E-Library Management System</h1>
</div>
            <div id="wrapper">
              <h3 id="heading">User Login Here.</h3>
              <div id="center">
                <?php
                if (isset($_POST["submit"])){
                  $sql="SELECT * FROM `student` WHERE NAME='{$_POST["name"]}' and PASS='{$_POST["pass"]}'";
                $res=$db->query($sql);
                if($res->num_rows>0){
                    $row=$res->fetch_assoc();
                    $_SESSION['ID']=$row['ID'];
                    $_SESSION['NAME']=$row['NAME'];
                   header("location:uhome.php");
                }
                else {
                echo "<p class='error'>Invalid user details</p>";
                }
                }
                ?>
              <form action="ulogin.php" method="post">
                <label>Name</label>
                <input type="text"name="name" required>
                <label>Password</label>
                <input type="password"name="pass" required>
                <button type="submit" name="submit">Login Now</button>
              </form>
              </div>
            </div>
            <div id="nav">
          <?php include "sidebar.php" ?>    
            </div>
            <div id="footer">
                <p>copyright &copy; Library 2023</p>
            </div>
        </div>
</body>
</html>