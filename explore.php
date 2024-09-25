<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fort.css">
    <link rel="stylesheet" href="Unesco.css">
    <link rel="stylesheet" href="Mountains.css">
    <link rel="stylesheet" href="beach.css">
    
    <link rel="stylesheet" href="explore.css">
    <title>Explore</title>
    <style>
        body{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .recentblogs{
            width:100vw;
            bottom:0;
          
        }
        .topplaces{
            width: 100vw;
        height: 350px;
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: space-evenly;
        margin: 15px 0px;
        }
        .topplaces a{
            width: 10%;
            height:100px;
            
        }
        .topplaces a:hover{
            opacity: 0.5;
          scale: 1.2;
        }
        .place{
            height:100px;
            width: 100%;
            border-radius: 10px;
            border : 1px solid white ;
       
        display: flex;
        flex-direction: column;
        }
       
    .blogs{
        width: 100vw;
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
        height: 9.7rem;
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
</head>
<body>
<h3><a href="index.php"><-Back to home</a></h3>
   <div class="container">
    <form action="explore.php" method ="post">
        <input type="text" name = "searchparam" class = "search" id ="bar"><button name="search" class="search" id ="sbtn">Search</button>
    </form>
   </div>
    <?php
    include "dbconnect.php";
    if(isset($_POST['search'])){
        $searchparam = $_POST['searchparam'];
        $sql = "SELECT * FROM forts WHERE fortname LIKE '%".$searchparam."%' OR fortdescription LIKE '%".$searchparam."%'; ";

          $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_row($result)){
           
            echo "<a href='$row[3]'>
    <div class='desc'id='fort$row[0]'>
        <div class='fimg'>
         
        </div>
        <div class='fwritten'>
            <h2>$row[1]</h2>
           <p> $row[2]</p>
        </div>
    </div>
   </a>";
          }
   $sql = "SELECT * FROM `unescosites` WHERE sitename like '%".$searchparam."%' or sitedesc like '%".$searchparam."%'; ";

   $result = mysqli_query($conn,$sql);
   while($row = mysqli_fetch_row($result)){
    
     echo "<a href='$row[3]'>
<div class='disc'id='unesco$row[0]'>
 <div class='uimg'>
  
 </div>
 <div class='uwritten'>
     <h2>$row[1]</h2>
    <p> $row[2]</p>
 </div>
</div>
</a>";
          }
          $sql = "SELECT * FROM `hillstations` WHERE hillstationname LIKE'%".$searchparam."%' or hillstationdesc LIKE'%".$searchparam."%'; ";

          $result = mysqli_query($conn,$sql);
          while($row = mysqli_fetch_row($result)){
           
            echo "<a href='$row[3]'>
       <div class='disc'id='mount$row[0]'>
        <div class='fimg'>
         
        </div>
        <div class='fwritten'>
            <h2>$row[1]</h2>
           <p> $row[2]</p>
        </div>
       </div>
       </a>";
                 }

                 $sql = "SELECT * FROM `beach` WHERE beachname LIKE'%".$searchparam."%' or beachdescription LIKE'%".$searchparam."%'; ";

                 $result = mysqli_query($conn,$sql);
                 while($row = mysqli_fetch_row($result)){
                  
                   echo "<a href='$row[3]'>
              <div class='disc'id='beach$row[0]'>
               <div class='bimg'>
                
               </div>
               <div class='bwritten'>
                   <h2>$row[1]</h2>
                  <p> $row[2]</p>
               </div>
              </div>
              </a>";
                        }
        
    }
    ?>
<br><br><br><br><br><br><br><br>
<h1 style="text-align:center; font-family:cursive">Recent blogs</h1><br><br>
    <div class="recentblogs">
        <?php
        $blogsql = "SELECT *FROM blogs INNER join user123 on blogs.userid = user123.userid;";
    $blogresult = mysqli_query($conn,$blogsql);
    $count = mysqli_num_rows($blogresult);
?>
<div class="blogs">
    <?php
   $num = 1;
   while($row = mysqli_fetch_row($blogresult)){
    if($num>=$count-3){
    echo "<div class='blog1'>
    <div class='prpinfo'> <div class='prp'><img src='images/$row[7]' > </div><h4>$row[5]</h4></div><br>
     <div class='blogsdesc'>
        <p>$row[3]</p></div>
   <a href='read.php?id=$row[0]'> <button id='read'>Read more</button></a>
    </div>
";
    }
    $num++;
   }
   
    ?>
    </div>
    </div>
    <br><br><br><br><br><br><br><br>
    <h1 style="text-align:center; font-family:cursive">Top places to visit</h1>
    <div class="topplaces">
        <a href="singlepages/Hill stations/Amboli.php">
            <div class="place">
                <div class="inner">
                    <img src="Amboli.png" alt="" style="object-fit: cover;height: 100px;width: 100%; border-radius: 10px;">
                    <div class="text">Amboli</div>
                </div>
            </div>
        </a>
       <a href="singlepages/Hill stations/Mahabaleshwar.php">
        <div class="place">
            <div class="inner">
                <img src="Mahabaleshwar.png" alt="" style="object-fit: cover;height: 100px;width: 100%; border-radius: 10px;">
                <div class="text">Mahabaleshwar</div>
            </div>
        </div>
       </a>
       <a href="singlepages/Hill stations/Matheran.php">
        <div class="place">
            <div class="inner">
                <img src="Matheran.jpg" alt="" style="object-fit: cover;height: 100px;width: 100%; border-radius: 10px;">
                <div class="text">Matheran</div>
            </div>
        </div>
       </a>
       <a href="singlepages/Beaches/Ganpatipule.php">
        <div class="place">
            <div class="inner">
                <img src="Ganpatipule.jpg" alt="" style="object-fit: cover;height: 100px;width: 100%; border-radius: 10px;">
                <div class="text">Ganpatipule</div>
            </div>
        </div>
       </a>
        <a href="singlepages/unescosites/Ajantha.php">
            <div class="place">
                <div class="inner">
                    <img src="Ajanta.jpg" alt="" style="object-fit: cover;height: 100px;width: 100%; border-radius: 10px;">
                    <div class="text">Ajanta</div>
                </div>
            </div>
        </a>
        <a href="singlepages/forts/Raigad.php">
            <div class="place">
                <div class="inner">
                    <img src="raigad.png" alt="" style="object-fit: cover;height: 100px;width: 100%; border-radius: 10px;">
                    <div class="text">Raigad</div>
                </div>
            </div>
        </a>
        <a href="singlepages/forts/shivneri.php">
            <div class="place">
                <div class="inner">
                    <img src="Shivneri.jpg" alt="" style="object-fit: cover;height: 100px;width: 100%; border-radius: 10px;">
                    <div class="text">Shivneri</div>
                </div>
            </div>
        </a>
        <a href="singlepages/forts/sindhadurg.php">
            <div class="place">
                <div class="inner">
                    <img src="Sindhdurg.jpg" alt="" style="object-fit: cover;height: 100px;width: 100%; border-radius: 10px;">
                    <div class="text">Sindhdurg</div>
                </div>
            </div>
        </a>
        <a href="singlepages/Hill stations/Igatpuri.php">
            <div class="place">
                <div class="inner">
                    <img src="Igatpuri.png" alt="" style="object-fit: cover;height: 100px;width: 100%; border-radius: 10px;">
                    <div class="text">Igatpuri</div>
                </div>
            </div>
        </a>
    </div>
</body>
</html>