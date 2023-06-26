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
              <h3 id="heading">Send your Comment </h3>
              <?php 
               if (isset($_POST["submit"])){    
                $sql="INSERT INTO comment (BID, SID, COMM, LOGS) VALUES ({$_GET["id"]},{$_SESSION["ID"]} ,'{$_POST["com"]}', now())";
                $db->query($sql);
                echo "<P class='success'>Comment Posted</P>";
             }

              $sql="select * from book where BID=".$_GET["id"];
              $res=$db->query($sql);
              if($res->num_rows>0){
               echo "<table>";
               $row=$res->fetch_assoc();
               echo "<tr>
               <th>Book Name</th>
               <td>{$row["BTITLE"]}</td>
               </tr>
               <tr>
               <th>Keywords</th>
               <td>{$row["KEYWORDS"]}</td>
               </tr>
               ";
              echo "</table>";
              }
              else{
               echo "<P class='error'>No Books Found</P>"; 
              }
              ?>
            <div id="center">
               <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
                <label >Your Comments</label>
                <textarea name="com" required></textarea>
                <button type="submit" name="submit">Post Now</button>
               </form>

            </div>
<?php  $sql="SELECT student.NAME,comment.COMM,comment.LOGS FROM comment INNER JOIN student ON comment.SID=student.ID WHERE comment.BID={$_GET["id"]} ORDER by comment.CID DESC";
$res=$db->query($sql);
if($res->num_rows>0){
while($row=$res->fetch_assoc()){
    echo "<P><strong>{$row["NAME"]} :</strong>
    {$row["COMM"]} <i> {$row["LOGS"]}</i>
    </P>";
}
}
else{
    echo "<P class='error'>No Comments Yet.</P>";
}
?>
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