<?php
    ob_start();

 
include '../cont.php';

      


    if(($_SERVER['REQUEST_METHOD'] == 'POST' )  ){
      
          // come back here
            //$hashpass= sha1($password);
     $name= $_POST['username'] ;
      $password= $_POST['password'] ;
      //FILTER THE USERNAME
     $username=filter_var($name,FILTER_SANITIZE_STRING);
     
            // check if the user in the database
        
           

            $stmt = $con->prepare("SELECT * FROM `admin` WHERE `adid`='$password' 
             AND  `adname`= '$username'  ");
            $stmt->execute();
           // $count= $stmt->fetch();
            $count=$stmt->rowCount();
            
            if($count>0){
             $_SESSION["username"]=$username;
              $_SESSION["password"]= $password;
               
            header('Location:dashbord.php');
              exit();

            }elseif($_SESSION['attempt']>2){
              $_SESSION['attempt']=0;
               header('location:login.php?Attempt=You have reached the maximum number of attempt');

            }
            else{
              $_SESSION['attempt']+=1;
              header('location:login.php?Invalid=incorrect pass or email');
            }

              
      
    }else{
     header('refresh=0');
     
    }
    


  ?>



<?php 
     if(@$_GET['Attempt'] ) {
       echo   "<P>" . $_GET['Attempt'] . "</P>";
   
?>

<?php 
  }else{
 
?>

 
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <title>Admin</title>
          <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha38
        4-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
         crossorigin="anonymous">
          <link rel="stylesheet" href="./layout/fonts/fontaw/css/all.min.css">
          <link rel="stylesheet" href="./layout/fonts/fontaw/css/fontawesome.min.css">
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" >
        <link rel="stylesheet" type="text/css" href="new.css">
     
   
  <style >
    

  
  </style>
    </head>


<body >

  <div class="loginpage">



      <nav class="navbar navbar-light container">
        <div class="container"style="background: #f5f5f5;">
          <a class="navbar-brand " href="<?php echo $_SERVER["PHP_SELF"]?>">ShopEbay</a>
          <form class="int d-flex">
            <button class="btn me-2 mr-2"  ><a class=" me-2" href="sginup.php" >SinUp</a></button>
              <button class="btn " ><a class=" me-2"  href="<?php echo $_SERVER['PHP_SELF']?>">LogIn</a></button>
          </form>
        </div>
      </nav>


      <h1>login page</h1>

      <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" 
       method="POST" enctype="multipart/form-data">
      <label for="">Name:</label>
      <input type="text" class="form-control" autocomplete="on" name="username" placeholder="Your name" required>
          <label for="">Password:</label>
      <input type="password" class="form-control" autocomplete="off" name="password" placeholder="password" required>
      <p class="forget "><a  href="forgetpage.php">Forget Password </a></p>
     <?php  if(@$_GET['Invalid']){
         ?>

         <p class='alert-danger text-danger text-center' style="    border-radius: 20px;
    max-width: 99%;
    padding: 10px;
    font-weight:bolder"> <?php echo $_GET['Invalid'];
         
         ?></p>
        <?php 
           }
        ?>
   
             
    
      <input type="submit" value="login" name="login " class="btn btn-primary" >
       </form>
 </div>
    
         


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

 <script src="../new.js"></script>    

</body>
</html>

 <?php }?>



  
    
  
