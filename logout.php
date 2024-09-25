<?php
session_start();
$login = false;
// $_SESSION['loggedin'];
if(isset($_SESSION['loggedin'])||$_SESSION['loggedin']==true){
    $login=true;
   }

else{
 header("location:form4.php");
}
if(isset($_POST['Logout'])){
    session_unset();
    session_destroy();
    header("location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logout</title>
 <style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
   

   
}
body{
    background-color: #2b263b;
}
.box{
    background-color: white;
    height: 40vh;
    width: 20vw;
    margin: auto;
    margin-top: 10%;
    border-radius: 10px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
button{
    background-color: #2b263b;
    color: white;
    height: 3rem;
    width: 5rem;
    border: none;
    border-radius: 10px;
    margin-top: 20px;
}
 </style>
</head>
<body>
    <div class="box">
        <h2>Are you sure You want to logout ?</h2>
        <form action="" method="post">
            <button name="Logout">Yes</button>
        </form>
    </div>
</body>
</html>
