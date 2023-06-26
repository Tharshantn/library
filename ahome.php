 <?php session_start();
 include "database.php";
function countRecord($sql,$db){
    $res=$db->query($sql);
    return $res->num_rows;
}
if (!isset($_SESSION["AID"])) {
    header("location:alogin.php");
}
?>
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
              <h3 id="heading">Welcome Admin</h3>
              <div id="center">
                <ul class="record">
                    <li>Total Students :<?php echo countRecord("select * from student",$db); ?></li>
                    <li>Total Books    :<?php echo countRecord("select * from book",$db); ?></li>
                    <li>Total Request  :<?php echo countRecord("select * from request",$db); ?></li>
                    <li>Total Comments :<?php echo countRecord("select * from comment",$db); ?></li>
                </ul>
              </div>
            </div>
            <div id="nav">
          <?php include "adminsidebar.php" ?>    
            </div>
            <div id="wel">
                <img src="wel.webp" alt="webp">
            </div>
            <div id="footer">
                <p>copyright &copy; Library 2023</p>
            </div>
        </div>
</body>
</html>