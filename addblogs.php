<?php


include "dbconnect.php";
session_start();
//echo "<h1>Hello ". $_SESSION['username']."</h1>";
$sql = "SELECT * FROM `user123` WHERE username ='".$_SESSION['username']."';";
$result = mysqli_query($conn,$sql);
$row2 = mysqli_fetch_row($result);


//INSERT INTO `blogs` (`blogid`, `place`, `description`, `timestamp`) VALUES (NULL, 'Buy books', 'Buy Atomic habits book from the Library', current_timestamp());
include "dbconnect.php";
 $insert = false;
 $update = false;
 $delete = false;

if(isset($_POST['snoedit'])){
  // echo "yes";
  $placeedit = $_POST['placeedit'];
  $descedit = $_POST['descedit'];
  $snoedit = $_POST['snoedit'];

  $sql3 = "UPDATE `blogs` SET `place` = '$placeedit', `description` = '$descedit' WHERE `blogs`.`blogid` ='$snoedit';";
$result = mysqli_query($conn,$sql3);
if($result){
  $update = true;
}

}

//delete
if(isset($_POST['deleteno'])){
  // echo "yes";
  $deleteno = $_POST['deleteno'];
  $sql3 = "DELETE FROM `blogs` WHERE `blogs`.`blogid` = $deleteno";
$result = mysqli_query($conn,$sql3);
if($result){
  $delete = true;
}

}
//insert
 if(isset($_POST['add'])){
  $place = $_POST['place'];
  $desc = $_POST['desc'];
  $insertsql = "INSERT INTO `blogs` ( `userid`,`place`, `description`) VALUES ($row2[0] ,'$place', '$desc');";
$result2 = mysqli_query($conn,$insertsql);
if($result2){
  $insert = true;
}
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <place></place>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href = "//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    
    <style>
        *{
    color:white;
}
      .edit btn btn-primary{
        background-color:#2b263b;
      }
      .modal-body h3{
        color:black;
      }
        #search1{
            height:3rem;
            width: 15rem;
            margin-bottom: 10px;
            color:black;
        }
        #search2{
            height:3rem;
            width: 4rem;
            background-color: white;
            color: #2b263b;
            border-radius: 10px;
            border: none;
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
    height: 100%;
    width: 20vw;
    background-color: #5b5376;
    top: 0px;
    position: absolute;
    display: flex;
    flex-direction: column;
}

ul{
    margin-top: 15vh;
}
li{
    margin-top: 30px;
    margin-left: 10px;
    font-size: 1.5rem;
}
a{
    text-decoration: none;
    color:white;
}
a:hover{
    opacity: 0.7;
}

.container{
  height:150%;
  width:60vw;
 
}
.content{
  height:100%;
  width:100vw;
  display:flex;
  justify-content:space-evenly;
}
body{
  background-color:#2b263b;
}
table{
  border:1px soild black;
}
option{
  color:black;
}
tr{
  border:1px solid black;
}
td{
  border:1px solid black;
}
    </style>
</head>


<body>


<div class="up"><button class="menu"><i class="fa-solid fa-bars" ></i></button> <h2>Menu</h2></div>
    <div class="sidebar">
        <ul type="none">
        <li><a href="index.php"><i class="fa-solid fa-house"></i>Home</a></li>
<li><a href="mypage.php"><i class="fa-solid fa-user"></i>Profile</a></li>
<li><a href="#"><i class="fa-regular fa-square-plus"></i>Add a blog</a></li>
<li><a href="yourblogs.php?id=<?php echo $row2[0]?>"><i class="fa-solid fa-blog"></i>Your Blogs</a></li>
        </ul>
    </div>
  <!-- Edit Modal -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Edit Modal
</button> -->

<!-- Modal -->
<div class="container">
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-place fs-5" id="editModalLabel" style="color:black">Edit record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ... <form action="addblogs.php" method = "post">
          <div class="mb-3">
            <input type="hidden" name="snoedit" id="snoedit">
            <label for="placeedit" class="form-label">Note place</label>
            <input type="text" class="form-control" id="placeedit" name="placeedit" aria-describedby="emailHelp">
            
          </div>
          <div class="mb-3">
              <label for="descedit" class="form-label">Blogs Description</label>
              <textarea class="form-control" id="descedit" name = "descedit"rows="3"></textarea>
            </div>
         
          <button type="submit" class="btn btn-primary" name = "editadd" style="background-color:#2b263b">Edit blog</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-place fs-5" id="deleteModalLabel" style="color:black">Delete blog</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ... <form action="addblogs.php" method = "post">
           <input type="hidden" name="deleteno" id="deleteno">
              <h3>Are you Sure?</h3>
          <button type="submit" class="btn btn-primary" name = "deleteelement" style="background-color:#2b263b">Delete blog</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
  

      <?php
      if($insert){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Blog Inserted Succesfully</strong> Your bolg has been inserted successfully !
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
      if($update){
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Blog edited Succesfully</strong> Your blod has been edited successfully !
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
      }
      if($delete){
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
       <stron>Blog deleted Succesfully</strong> Your Blog has been deleted successfully !
     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
      }
      // else{
      //   echo "<div class='alert alert-danger' role='alert'>
      //             Record was not able to be inserted
      //           </div>";
      // }
      ?>
      <div class="container my-4">
        <h2>Add a Blog</h2>
        <form action="addblogs.php" method = "post">
            <div class="mb-3">
              <label for="place" class="form-label">Select place name </label>
              <input type="text" name="search1" id="search1" placeholder="Search place..." > <button name="search2" id ="search2">Search</button>
              <select class="form-select" aria-label="Default select example" name='place'>
                        <option selected>Select place name</option> 
                        <?php
                        if(isset($_POST['search2'])){
                            $search1 = $_POST['search1'];
                            $sql = "select fortname from forts where fortname Like'%".$search1."%'";
                            $res = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_row($res)){
                            
                             echo " <option value='$row[0]'>$row[0]</option>";
                            }
                            $sql = "select hillstationname from hillstations where hillstationname Like'%".$search1."%'";
                            $res = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_row($res)){
                            
                             echo " <option value='$row[0]'>$row[0]</option>";
                            }
                            $sql = "select sitename from unescosites where sitename Like'%".$search1."%'";
                       $res = mysqli_query($conn,$sql);
                       while($row = mysqli_fetch_row($res)){
                       
                        echo " <option value='$row[0]'>$row[0]</option>";
                       }
                       $sql = "select beachname from beach where beachname Like'%".$search1."%'";
                       $res = mysqli_query($conn,$sql);
                       while($row = mysqli_fetch_row($res)){
                       
                        echo " <option value='$row[0]'>$row[0]</option>";
                       }   
                        }
                        else{
                        
                       $sql = "select fortname from forts";
                       $res = mysqli_query($conn,$sql);
                       while($row = mysqli_fetch_row($res)){
                       
                        echo " <option value='$row[0]'>$row[0]</option>";
                       }
                     
                       $sql = "select hillstationname from hillstations";
                       $res = mysqli_query($conn,$sql);
                       while($row = mysqli_fetch_row($res)){
                       
                        echo " <option value='$row[0]'>$row[0]</option>";
                       }
                       
                       $sql = "select sitename from unescosites";
                       $res = mysqli_query($conn,$sql);
                       while($row = mysqli_fetch_row($res)){
                       
                        echo " <option value='$row[0]'>$row[0]</option>";
                       }
                       $sql = "select beachname from beach";
                       $res = mysqli_query($conn,$sql);
                       while($row = mysqli_fetch_row($res)){
                       
                        echo " <option value='$row[0]'>$row[0]</option>";
                       }
                    }
                       ?>
                        </select>
              
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">blogs Description</label>
                <textarea class="form-control" id="desc" name = "desc" rows="3"></textarea>
              </div>
           
            <button type="submit" class="btn btn-primary" name = "add" style="background-color:#2b263b">Add Blog</button>
          </form>
      </div>
      <div class="container my-4">
        
        <table class="table" id = "myTable">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">place</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
       $sql2 = "SELECT * FROM blogs where userid = ".$row2[0].";";
       $result2 = mysqli_query($conn,$sql2);
       
       $sno=0;
       while($row = mysqli_fetch_assoc($result2)){
        $sno++;
       echo  "<tr>";
      echo  "<th scope='row'>". $sno ."</th>";
      echo "<td> " . $row['place'] . "</td>";
      echo "<td>" . $row['description'] . "</td>";
      // data-bs-toggle='modal' data-bs-target='#editModal'
      echo "<td><button type='button' class='edit btn btn-primary' style='background-color:#2b263b' id= '".$row['blogid']."' >
  Edit
</button> <button type='button' class='delete btn btn-primary' style='background-color:#2b263b' id= '".$row['blogid']."'>
  delete
</button></td>";
    echo "</tr>";
          
       }
        ?>
    
  </tbody>
</table>
      </div>
      </div>
      
</div>

      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script>
      	
        let table = new DataTable('#myTable');
    </script>
    <script>
      let edits = document.getElementsByClassName('edit');
      Array.from(edits).forEach((element) => {
        element.addEventListener('click',(e)=>{
           console.log("edit");
           tr = e.target.parentNode.parentNode;
           place = tr.getElementsByTagName('td')[0].innerText;
           desc = tr.getElementsByTagName('td')[1].innerText;
           console.log(place,desc);
           descedit.value = desc;
           placeedit.value=place;
           snoedit.value = e.target.id;
           console.log(snoedit);
           $('#editModal').modal('toggle');
        })
      });

      let deletes= document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element) => {
        element.addEventListener('click',(e)=>{
           console.log("delete");
           tr = e.target.parentNode.parentNode;
          
           deleteno.value = e.target.id;
           console.log(deleteno.value);
           $('#deleteModal').modal('toggle');
        })
      });
      let navbtn = document.querySelectorAll(".dt-paging-button");
      console.log(navbtn);
      navbtn.forEach((element)=>{
          element.style.color = "white !important";
        element.style="color:white !important;line-height:1.5rem;";
      })
      let title = document.querySelectorAll(".dt-column-title");
      console.log(navbtn);
      title.forEach((element)=>{
      
        element.style="color:black !important;";
      })

    
          </script>

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
<script>
  const sideMenu = document.querySelector('.sidebar');
console.log(sideMenu);
        if (sideMenu) {
            const pageHeight = document.documentElement.scrollHeight;
            sideMenu.style.height = pageHeight + 'px';
        }
</script>
</body>
</html>