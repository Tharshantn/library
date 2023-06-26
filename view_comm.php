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
              <h3 id="heading">View comment Details.</h3>
              <?php
$sql="SELECT book.BTITLE,student.NAME,comment.COMM,comment.LOGS FROM comment INNER JOIN book ON BOOK.BID=comment.BID INNER JOIN student ON comment.SID=student.ID";
$res=$db->query($sql);
if($res->num_rows){
    echo "<table>
 <tr>
 <th>S.NO</th>
 <th>BOOK</th>
 <th>NAME</th>
 <th>COMMENT</th>
 <th>LOGS</th>
 </tr>";
 
  $i=0;
  while ($row=$res->fetch_assoc()) {
    $i++;
    echo "<tr>";
   echo "<td>{$i}</td>";
   echo "<td>{$row["BTITLE"]}</td>";
   echo "<td>{$row["NAME"]}</td>";
   echo "<td>{$row["COMM"]}</td>";
   echo "<td>{$row["LOGS"]}</td>";
   echo "</tr>";
  }
  echo  "</table>";
}
else{
    echo "<P class='error'>No comment Found</P>";
}
              ?>
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