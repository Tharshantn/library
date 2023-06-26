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
              <h3 id="heading">Change Password</h3>
            <div id="center">
                <?php
                if (isset($_POST["submit"])){
                    $sql="select * from student where PASS='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0){
                         $s="update student set PASS='{$_POST["npass"]}' where ID=".$_SESSION["ID"];
                         $db->query($s);
                         echo "<P class='success'>Password changed successfully</P>";
                    }
                    else{
                        echo "<P class='error'>Invalid Password</P>";
                    }
                }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"  method="post" >
            <label>Old Password</label>
            <input type="password" name="opass" required>
            <label>New Password</label>
            <input type="password" name="npass" required>
            <button type="submit" name="submit">Update Password</button>
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