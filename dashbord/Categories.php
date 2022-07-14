<?php

 session_start();

if(isset($_SESSION['username']) ){
include 'ini.php';

?>


<?php
$page='';
if(isset($_GET['page'])){
    $page=$_GET['page'];
     
}else{
    $page='cats';
  
}

if($page=='cats'){
    $catname='';
   $stmt = $con->prepare("SELECT * FROM cat  ");
    $stmt->execute();
      $rows=$stmt->fetchAll();
      
    
  
    
?>
<main>
           <div class="cat">
            
            <h1>Categories page</h1>

            <div class="cat1">
                <h3>Catigories</h3>
                <?php foreach($rows as $row){
        
               ?>
                
                <div class="cats">
                    <p><?php echo $row['catname']?></p>
                    <div class="btnss">
                         <a class="btn btn-dark"  href="categories.php?page=view&
                        catid=<?php echo $row['catid']?>">
                            View
                        </a>
                        <a class="btn btn-secondary"  href="categories.php?page=update&
                        catid=<?php echo $row['catid']?>">
                            Update
                        </a>
                        <a class="btn btn-danger delete"  href="categories.php?page=delete&
                        catid=<?php echo $row['catid']?>">
                        delete 
                    </a>
                    </div>
                </div>
                      <?php
                }

                ?>
               
            </div>
            

           <div class="lastbtn" style="margin-left: 5px;">
             <a class="btn btn-primary h3" href="categories.php?page=add" style="font-size: 18px;">+Add</a>
           </div>
            



           </div>
 </main>

 <?php 
}elseif($page=='view'){
  $id=$_GET['catid'];
  
    $stmt2 = $con->prepare("SELECT * FROM  cat WHERE catid=$id LIMIT 1");
        $stmt2->execute();
          $cm=$stmt2->fetchAll(); 
         

      $stmt = $con->prepare("SELECT * FROM store WHERE catid=$id");
        $stmt->execute();
          $cc=$stmt->fetchAll();

 ?>

         
              <div class="sections " style="margin:0px">
                    <h1 class="text-center" style="margin-bottom: 20px;">
                    <?php foreach($cm as $name) echo $name['catname']; ?>
                  </h1>
                <div class="row">
                   <?php
                   foreach($cc as $sec){

                   
                   ?>
                    <div class="sec1 col-12 col-sm-6 col-md-3">
                        <div class=" secim part1">
                            <img src="<?php echo $sec['photo'];?>">
                        </div>
                        <div class="secin part2">
                            <h4><?php echo $sec['proname'];?> <span><?php echo $sec['proid'];?></span></h4> 
                            <p><?php echo $sec['address'];?></p>
                            <p class="text-muted"><?php echo $sec['phone'];?></p>

                        </div>
                        
                    </div>
                   
                   <?php  }?>

                 </div>   
               
              </div>





<?php }elseif($page=='update'){
    $id=$_GET['catid'];

     $stmt = $con->prepare("SELECT * FROM cat WHERE catid=$id ");
    $stmt->execute();
    $cc=$stmt->fetch();
     
     
?>
 <div class="update">
      <h1>Update page</h1>

      <form class="update" action="?page=edit&catid=<?php echo $id?>"  method="POST">
      <label for="">Catname:</label>
      <input type="text" class="form-control" autocomplete="on"
       name="catname" value="<?php echo $cc['catname']?>" >
       <label for="">Adress:</label>
      <input type="text" class="form-control" autocomplete="on"
       name="address" value="<?php echo $cc['address']?>" >
       <label for="">Phone:</label>
      <input type="text" class="form-control" autocomplete="on"
       name="phone" value="<?php echo $cc['phonenum']?>" >
          
  
   
             
    
      <input type="submit" value="Update" name="update " class="btn btn-primary" >
       </form>
 </div>
 <?php } elseif($page=='edit'){

  echo "<h1 class='text-center' style='height:fit-content'> Update member</h1>";
     if($_SERVER['REQUEST_METHOD'] == 'POST' ){
       $id=$_GET['catid'];
        $catname=$_POST['catname'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];

        $stmt=$con->prepare("UPDATE cat SET catname=?, address=?, phonenum=?  WHERE catid=?");
         $stmt->execute(array($catname ,$address ,$phone,$id));

       header('Location: categories.php');
       exit();

?>
  

<?php  }} elseif($page=='delete'){

$id=$_GET['catid'];
 $stmt = $con->prepare("SELECT * FROM cat WHERE catid=$id ");
    $stmt->execute();
    $count= $stmt->rowCount();
          

    if( $count>0)
       {
        $stmt3=$con->prepare("DELETE  from cat  WHERE catid=$id LIMIT 1");
         $stmt3->execute();
         
       header('Location: Categories.php');
       exit();

       }

       
?>

<?php }elseif($page=='add'){


?>

<div class="update">
      <h1>Add cat page</h1>

      <form class="update" action="?page=insert"  method="POST" enctype="multipart/form-data">
      <label for="">Catname:</label>
      <input type="text" class="form-control" autocomplete="on"
       name="catname" required >
       <label for="">Adress:</label>
      <input type="text" class="form-control" autocomplete="on"
       name="address" required >
       <label for="">Phone:</label>
      <input type="text" class="form-control" autocomplete="on"
       name="phone"  required>
       <label for="">Select a Photo:</label>
       <input type="file" class="form-control" 
       name="uploadfile"  required>
    
          
  
   
             
    
      <input type="submit" value="Add" name="update " class="btn btn-primary" >
       </form>
 </div>



 <?php 

   }elseif($page=='insert'){
            
            if($_SERVER['REQUEST_METHOD']=='POST'){

        $catname=$_POST['catname'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
   
    
      
      
         
      
          $imager=$_FILES["uploadfile"]["tmp_name"];

       
                       

        
           $stmt=$con->prepare("INSERT INTO 
                     `cat`(`catname` , `address` , `phonenum`,`photo`) 
                      VALUES(:zname , :zadd  ,  :zphone , :zph)");

                  $stmt->execute(array(

                    'zname'=> $catname,
                    'zadd'=> $address,
                    'zphone'=> $phone,
                    'zph'=> $imager
                    
                  ));
                  header('Location: categories.php');
                  exit();
            

      
        //   $image=base64_encode(file_get_contents(addslashes($_FILES['file']['tmp_name'])));
          
         

                
            }
            
?>
<?php }?>

 <?php
}
else{
  include 'login.php';
}

include 'footer.php';
?>
