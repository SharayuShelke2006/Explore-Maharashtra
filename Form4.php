<?php
include "dbconnect.php";
if(isset($_POST['login'])){
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "select * from user123 where username='$username' AND password='$password';";
$result = mysqli_query($conn,$sql);
$err=false;
if($result){
    while($rows =mysqli_fetch_row($result)){
        if($username == $rows[1]&&$password==$rows[2] )
        $err=true;
    }
}
if($err==true){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Logged in </strong> You have logged in successfully !
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
session_start();
$_SESSION['loggedin']=true;
$_SESSION['username']=$username;
sleep(1);
header("location:mypage.php");
}
else{
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Error</strong> Check Your username or password !
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="From4.css">
</head>
<body>
    <h1 id="heading">LOGIN FORM</h1>
    <div class="content">
        
        <div class="login">
            <div class="inner">
                <h2>Login Form</h2>
            <form action="form4.php" method = "post">
                <br>
            <input class="common" type="username" placeholder="Enter your username" name ="username" required> <br> <br>
            <input class="common" type="password" placeholder="Password" name = "password" required> <br> <br>
            <button name = "login">LOGIN</button> <br>
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>