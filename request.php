<?php session_start(); 
include "database.php";
if (!isset($_SESSION["ID"])) {
    header("location:ulogin.php");
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
              <h3 id="heading">New Book Request</h3>
            <div id="center">
                <?php
                if (isset($_POST["submit"])){
                    $sql="insert into request (ID,MES,LOGS) values({$_SESSION["ID"]},'{$_POST["mess"]}',now())";
                    $res=$db->query($sql);
                         echo "<P class='success'>Request Sent To Admin</P>";
                    }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"  method="post" >
            <label>Message</label>
            <textarea name="mess" required></textarea>
            <button type="submit" name="submit">Send Message</button>
            </form>
            </div>
            </div>
            <div id="nav">
          <?php include "usersidebar.php" ?>    
            </div>
            <div id="footer">
                <p>copyright &copy; Library 2023</p>
            </div>
        </div>
</body>
</html>