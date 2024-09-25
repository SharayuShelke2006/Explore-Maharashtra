<?php
include "dbconnect.php";
session_start();
//echo "<h1>Hello ". $_SESSION['username']."</h1>";
$sql = "SELECT * FROM `user123` WHERE username ='".$_SESSION['username']."';";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_row($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['username']?>'s Page</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="mypage.css">
<style>
    body{
     font-family:verdana;
    }
    .menu{
    height: 3rem;
    width: 4rem;
    font-size: 2rem;
    background-color: white;
    color: #2b263b;
    border: none;
    border-radius: 10px;
    margin-top: 10px;
    margin-left: 15px;
}

.menu i{
    color: #2b263b;
}
h1{
    text-align: center;
}
.up{
    z-index: 5;
    position: relative;
    display: flex;
    
}
.up h2{
    margin-top: 20px;
    margin-left: 10px;
    font-weight: 800;
    font-size: 1.7rem;
}
.sidebar{
    height: 100vh;
    width: 20vw;
    background-color: #5b5376;
    top: 0px;
    position: absolute;
    display: flex;
    flex-direction: column;

    
    
}

ul{
    margin-top: 15vh;
    margin-left:1.5rem;
}
li{
    margin-top: 2.3rem;
    margin-left: 10px;
    font-size: 1.4rem;
}
a{
    text-decoration: none;
}
a:hover{
    opacity: 0.7;
}
.prp{
    height:200px;
    width:200px;
    border-radius: 50%;

}
.prp img{
    height:200px;
    width:200px;
    border-radius: 50%;

}
</style>
</head>
<body>
    <div class="up"><button class="menu"><i class="fa-solid fa-bars" ></i></button> <h2>Menu</h2></div>
    <div class="sidebar">
        <ul type="none">
        <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
<li><a href="#"><i class="fa-solid fa-user"></i>Profile</a></li>
<li><a href="addblogs.php"><i class="fa-regular fa-square-plus"></i>Add a blog</a></li>
<li><a href="yourblogs.php?id=<?php echo $row[0]?>"><i class="fa-solid fa-blog"></i>Your Blogs</a></li>
        </ul>
    </div>

    <center><div class="prp"><img src="images/<?php echo $row[3]?>" alt=""></div></center>
    <h1><?php echo "Hello ". $_SESSION['username']?></h1>
</body>
<script>
    let menu = document.querySelector(".menu");
    let toggle = 1;
    menu.addEventListener("click",()=>{
        let sidebar=document.querySelector(".sidebar");
       if(toggle%2==1){
           sidebar.style="left:-350px";
       }
       else{
        sidebar.style="left:0px";
       }
       toggle++;
       
    });
</script>
</html>