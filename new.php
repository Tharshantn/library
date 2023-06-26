<?php 
include "database.php";
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
              <h3 id="heading">New User Registration</h3>
            <div id="center">
                <?php
                if (isset($_POST["submit"])){
                   
                    $sql="insert into student(NAME,PASS,MAIL,DEP) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["mail"]}','{$_POST["dep"]}')";
                    $db->query($sql);
                    echo "<P class='success'>User Registration Successful</P>";
                 }
                 
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"  method="post" enctype="multipart/form-data" >
            <label>Name</label>
            <input type="text" name="name" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <label>Email ID</label>
            <input type="email" name="mail" required>
            <select name="dep" required>
                <option value="">Select</option>
                <option value="BCA">BCA</option>
                <option value="MCA">MCA</option>
                <option value="BSC.CS">BSC.CS</option>
                <option value="MSC.CS">MSC.CS</option>
                <option value="BSC.IT">BSC.IT</option>
                <option value="MSC.IT">MSC.IT</option>
                <option value="OTHERS">OTHERS</option>
               
            </select>
            <button type="submit" name="submit">Register Now</button>
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