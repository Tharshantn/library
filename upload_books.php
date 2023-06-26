<?php session_start(); 
include "database.php";
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
              <h3 id="heading">Upload New Book</h3>
            <div id="center">
                <?php
                if (isset($_POST["submit"])){
                   $target_dir="upload/";
                 $target_file=$target_dir.basename($_FILES["efile"]["name"]);
                 if(move_uploaded_file($_FILES["efile"]["tmp_name"], $target_file)){
                    $sql="insert into book(BTITLE,KEYWORDS,FILE) values('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
                    $db->query($sql);
                    echo "<P class='success'>Book Uploaded Successfully</P>";
                 }
                 else{
                    echo "<P class='error'>Error In Upload</P>";
                 }
                }
                ?>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"  method="post" enctype="multipart/form-data" >
            <label>Book Title</label>
            <input type="text" name="bname" required>
            <label>Keyword</label>
            <textarea name="keys" required></textarea>
            <label>Upload File</label>
            <input type="file" name="efile" required>
            <button type="submit" name="submit">Upload Book</button>
            </form>
            </div>
            </div>
            <div id="nav">
          <?php include "adminsidebar.php" ?>    
            </div>
            <div id="footer">
                <p>copyright &copy; Library 2023</p>
            </div>
        </div>
</body>
</html>