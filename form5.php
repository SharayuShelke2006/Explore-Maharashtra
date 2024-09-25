<?php
session_start();
if((isset($_SESSION['loggedin']))&&($_SESSION['loggedin']==true)){
    header("location:mypage.php");
   }
   else{
    echo "";
   }
include "dbconnect.php";
if(isset($_POST['signup'])){
$username = $_POST['username'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$filename = $_FILES['file']['name'];
$filetype = $_FILES['file']['type'];
$filesize = $_FILES['file']['size'];
$filetemp = $_FILES['file']['tmp_name'];
echo "$filetype";
$filestore = "images/".$filename;

if(move_uploaded_file($filetemp,$filestore))
{

   
}

$sql = "select username from user123;";
$result = mysqli_query($conn,$sql);
$err=false;
if($result){
    while($rows =mysqli_fetch_row($result)){
        if($username == $rows[0] )
        $err=true;
    }
}
if(($cpassword==$password)&&( $err==false)){
$insertsql = "INSERT INTO `user123` (`username`, `password`,`profpic`) VALUES ('$username', '$password','$filename');";
mysqli_query($conn,$insertsql);
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>Signe up in </strong> You have signed in successfully !
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
session_start();
$_SESSION['loggedin']=true;
$_SESSION['username']=$username;
$_SESSION['userid']=$rows[0];
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
    <title>Sign up form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="From4.css">
    <style>
        .box{
            height:40%;
            width: 80%;
            margin:auto;
            display: flex;
            align-items:center;
            border:1px dashed white;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .box input{
            background-color: none;

        }
    </style>
</head>
<body>
    <h1 id="heading">SIGN-UP FORM</h1>
    <div class="content">
        
        <div class="register">
            <div class="inner">
             <h2>Sign up Form</h2>
            <form action="form5.php" method="post" enctype="multipart/form-data">
                <div class="box"><label for="profpic">Select a profile Picture</label><input type="file" name ="file" placeholder="Select a profile Picture" accept=".jpg, .jpeg"></div>

            <input class="common"type="text" placeholder="Username" name ="username" required> <br> <br> 
             
             <input class="common" type="password" placeholder="Password" name = "password" required> 
             <p >Minimum of 6 characters</p> 
             <input  class="common" type="password" placeholder="Confirm password" name = "cpassword" required> <br><br>
             
              <button type="submit" name = "signup">SIGN UP</button> <br>
            </form>
            </div>
     
     
         </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>