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
              <h3 id="heading">Search Book</h3>
            <div id="center">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>"  method="post" >
            <label>Enter Book Name Or Keywords</label>
            <input type="text" name="name" required>
            <button type="submit" name="submit">Search Now</button>
            </form>
            </div>
            <?php
            if (isset($_POST["submit"])){
 $sql="select * from book where BTITLE like '%{$_POST["name"]}%' or keywords like '%{$_POST["name"]}%'";
$res=$db->query($sql);
if($res->num_rows>0){
    echo "<table>
 <tr>
 <th>S.NO</th>
 <th>BOOK NAME</th>
 <th>KEYWORDS</th>
 <th>LOCATION</th>
 <th>COMMENT</th>
 </tr>";
 
  $i=0;
  while ($row=$res->fetch_assoc()) {
    $i++;
    echo "<tr>";
   echo "<td>{$i}</td>";
   echo "<td>{$row["BTITLE"]}</td>";
   echo "<td>{$row["KEYWORDS"]}</td>";
   echo "<td><a href='{$row["FILE"]}' target='_blank'>view </a></td>";
   echo "<td><a href='comment.php?id={$row["BID"]}'>go</a></td>";
   echo "</tr>";
  }
  echo  "</table>";
}
else{
    echo "<P class='error'>No  Record Found</P>";
}
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