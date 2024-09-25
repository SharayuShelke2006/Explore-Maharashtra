<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    *{
        color: white;
        margin: 0;
        padding: 0;
    }
    
    body{
        background-color: #2b263b;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
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
float: left;
    
    
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
     .blogs{
        float: right;
        width: 80vw;
        height: 350px;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        margin: 15px 0px;
        
    }
    .blog1{
        height: 100%;
        width: 20%;
        background-color: white;
        border-radius: 10px;
        padding: 5px;
        display: flex;
        flex-direction: column;
        
        
    }
    .blog1:hover{
        opacity: 0.5;
    }
    .prpinfo{
        display: flex;
        width: 100%;
        align-items: center;
       
    }
    .blog1 h4,.blog1 p{
        color: black;
        
    }
    .blog1 p{
        height: 11rem;
        overflow: hidden;
    }
    .prp{
       
        height: 3rem;
        width: 3rem;
        border: 1px solid black;
        border-radius: 50%;
    }
    .prp img{
        height: 3rem;
        width: 3rem;
        border-radius: 50%;
        object-fit: cover;
    }
    .blog1 #read{
       align-self: flex-end;
        height: 2rem;
        width: 3.5rem;
        background-color:  #2b263b;
        color: white;
        border-radius: 10px;
        font-size: 0.7rem;
        
    }
</style>
<body>
    <div class="up"><button class="menu"><i class="fa-solid fa-bars" ></i></button> <h2>Menu</h2></div>
    <div class="sidebar">
        <ul type="none">
        <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
<li><a href="mypage.php"><i class="fa-solid fa-user"></i>Profile</a></li>
<li><a href="addblogs.php"><i class="fa-regular fa-square-plus"></i>Add a blog</a></li>
<li><a href="#"><i class="fa-solid fa-blog"></i>Your Blogs</a></li>
        </ul>
    </div>
    <h1 style="text-align: center; margin-left: 150px;">Your blogs</h1>
<?php
include "dbconnect.php";
        $blogsql = "SELECT *FROM blogs INNER join user123 on blogs.userid = user123.userid where blogs.userid =".$_GET['id'].";";
    $blogresult = mysqli_query($conn,$blogsql);
    $count = mysqli_num_rows($blogresult);
?><br><br><br>

<div class="blogs">
   
    <?php
  
   while($row = mysqli_fetch_row($blogresult)){
    
    echo "<div class='blog1'>
    <div class='prpinfo'> <div class='prp'><img src='images/$row[7]' > </div><h4>$row[5]</h4></div><br>
     <div class='blogsdesc'>
        <p>$row[3]</p></div>
   <a href='read.php?id=$row[0]'> <button id='read'>Read more</button></a>
    </div>
";
    }

   ?>
   </div>
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
</body>
</html>