<?php
session_start();
$login = false;
if((isset($_SESSION['loggedin']))&&($_SESSION['loggedin']==true)){
 $login=true;
}
// else{
// }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maharshtra Tourism</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+MX:wght@100..400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
   
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playwrite+ES+Deco:wght@100..400&family=Playwrite+MX:wght@100..400&family=Playwrite+NG+Modern:wght@100..400&display=swap');
        </style>
</head>
<body>
    <div class="header">
      <div class="box">
        <video src="Backvideo.mp4" autoplay muted loop></video>
    </div>
        <div class="navbar">
          <div class="logo">
            <h1 >Maharashtra</h1>
            <h2>आपला महाराष्ट्र</h2>
          </div>
           <div class="links">
            <h3><a href="#">Home</a></h3>
           <h3><a href="About.html">About us</a></h3>
           <h3><a href="Form4.php">login</a></h3>
           <h3><a href="form5.php">sign up</a></h3>
           <h3><a href="logout.php">logout</a></h3>
           <h3><a href="explore.php">Explore</a></h3>
           <?php if($login==true) echo "<h3><a href='mypage.php'>My page</a></h3>"?>
           </div>

        </div>
        
       
    </div>
    <hr style="margin-top: -15px;">
    <div class="content">
        <!-- <button class="slide">
            <i class="fa-solid fa-arrow-right"></i>
        </button> -->
        <a href="forts.html">
            <div class="place" id="place1">
                <div class="placeinner"></div>
                <i class="fa-brands fa-fort-awesome"></i>
                <h3>Forts</h3>
            </div>
        </a>
       <a href="beach.html">
        <div class="place" id="place2">
            <div class="placeinner"></div>
            <i class="fa-solid fa-umbrella-beach"></i>
            Beaches
        </div>
       </a>
       <a href="Mountains.html">
        <div class="place" id="place3">
            <div class="placeinner"></div>
            <i class="fa-solid fa-mountain"></i>
            <h3>Hill Stations</h3>
        </div>
       </a>
       <a href="Unesco.html">
        <div class="place" id="place4">
            <div class="placeinner"></div>
            <i class="fa-solid fa-gopuram"></i>
            <h3>Unesco sites</h3>
        </div>
       </a>
        <!-- <a href="#"> see more -></a> -->
       
    </div>
    <hr>
    <footer>
        <div class="footercontent">
            <div class="left">
                <div class="footerlogo">
                    <h1 >Maharashtra</h1>
                    <h2>आपला महाराष्ट्र</h2>
                </div>
                <h3 style="color: #404852;margin-top: 20px;">The traveler sees what he sees, the tourist sees what he has come to see. ..</h3>
            </div>
            <div class="right">
             
               <div class="rightcontent">
                <ul type="none">
                    <h3>Popular Regions</h3>
                    <li>Nashik</li>
                   <li> Ratnagiri</li>
                    <li>Pune</li>
                   <li> Aurangabad</li>
                    <li>Nagpur</li>
                    
                </ul>
                <ul type="none">
                    <h3>Explore Maharashtra</h3>
                    <li>Forts</li>
                   <li> Beaches</li>
                    <li>Hill stations</li>
                   <li>Unesco sites</li>
                   
                    
                </ul>
               </div>
                <div class="touch">
                    <h3>Get in touch</h3>
                    <i class="fa-brands fa-facebook"></i><i class="fa-brands fa-twitter"></i><i class="fa-brands fa-instagram"></i>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>