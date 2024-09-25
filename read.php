<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
include "dbconnect.php";
$sql= "select * from blogs inner join user123 on blogs.userid=user123.userid where blogid = $id";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_row($result)){
    echo "<div style = 'display:flex; align-items:center;'>";
    echo "<img src='images/$row[7]' style = 'height : 5rem ; width:5rem ; border-radius:50% ; '>";
    echo "<h2 style='margin-left:10px'>$row[5]</h2>";
    echo "</div>";
    echo "<h2>$row[2]</h2>";
    echo "<p style='font-size: 1.2rem;'>$row[3]</p>";
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color:  #2b263b;
            color: white;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>
<body>
    
</body>
</html>