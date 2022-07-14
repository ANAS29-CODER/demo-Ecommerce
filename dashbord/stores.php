<?php

ob_start();
 session_start();

include 'ini.php';
if(isset($_SESSION['username'])){

  $page='';
if(isset($_GET['page'])){
    $page=$_GET['page'];
     
}else{
    $page='cats';
  
}
if($page=='cats'){
/* $stmt2 = $con->prepare("SELECT t1.catname
                        FROM store m
                        JOIN cat t1 ON m.catid = t1.catid ");*/
     $stmt2 = $con->prepare("SELECT * from cat ");
    $stmt2->execute();
      $cc2=$stmt2->fetchAll(); 
/*
  $stmtd = $con->prepare("SELECT * FROM store ");
                    $stmtd->execute();
                      $cc=$stmtd->fetchAll();*/
?>




        <main>
            
            <div class="stores">
                <h1 style="margin-bottom: 20px;">Stores page</h1>

                <a class="btn btn-primary" href="stores.php?page=additem" 
                style="margin-left: 10px; margin-bottom: 14px;
                font-weight: 600;font-size: 20px;">Add product +</a>
                <br>
                <form class="sel" action="<?php echo $_SERVER['PHP_SELF']?>"  method="POST" enctype="multipart/form-data">
                <select class="form-select form-select-lg mb-3"  name="cati"
                aria-label=".form-select-lg example">
                <?php 
                 echo "<option  selected >All Categories</option>";
                foreach($cc2 as $name2){
               
                 
                   echo "<option >" . $name2['catname'] . " </option>";
                  
                }
                  
                   
                
               
                ?>
                     
                    </select>
           <input type="submit" value="serch" name="ad " 
           class="btn btn-primary" style="margin-bottom: 16px;font-size: 16px;" >
                </form>
                   <?php    
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                      $df=$_POST['cati'];
 
                      if($df=="All Categories"){
                        $stmtdv = $con->prepare("SELECT * FROM store  ");
                    $stmtdv->execute();
                      $cc=$stmtdv->fetchAll();
                      }else{
                        $sv = $con->prepare("SELECT catid FROM cat WHERE catname='$df' ");
                        $sv->execute();
                        $cv=$sv->fetchAll();
                        $sss= $cv[0][0];  

                        $stmtdv = $con->prepare("SELECT * FROM store WHERE catid='$sss' ");
                        $stmtdv->execute();
                          $cc=$stmtdv->fetchAll();
                      }
                       
                    }else{
                      $stmtdv = $con->prepare("SELECT * FROM store  ");
                    $stmtdv->execute();
                      $cc=$stmtdv->fetchAll();
                    }
                   

                   
                     //$bn=$cv['0'];
                    // print_r ($cv);
                     
              
                   
                      
                   ?>
              <div class="sections ">

                <div class="row">
                   <?php
                   foreach($cc as $sec){

                   
                   ?>
                  <div class="sec1 col-12 col-sm-6 col-md-3">
                        <div class=" secim part1">
                            <img src="<?php echo $sec['photo'];?>">
                        </div>
                        <div class="secin part2">
                            <h4><?php echo $sec['proname'];?> <span><?php echo $sec['proprice'];?>$</span></h4> 
                            <p><?php echo $sec['address'];?></p>
                            <p class="text-muted"><?php echo $sec['phone'];?></p>
                            <div class="bts" style="text-align:center">
                              <a href="stores.php?page=update&&proid=<?php echo $sec['proid']?>" 
                              class="btn btn-secondary">Update</a>

                              <a  href="stores.php?page=delete&&proid=<?php echo $sec['proid']?>" class="btn btn-danger delete">
                              Delete</a>
                            </div>
                            

                        </div>
                   </div>
                   
                   <?php  }?>

                   
               
              </div>
            </div>
    
<div class="rate" style="margin-top:10px">
        <span class="heading">User Rating</span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star "></span>
        <p>4.1 average based on <span> 254 reviews. </span> </p>
        <hr style="border:3px solid #f1f1f1">

        <div class="row">
          <div class="side">
            <div>5 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-5"></div>
            </div>
          </div>
          <div class="side right">
            <div>150</div>
          </div>
          <div class="side">
            <div>4 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-4"></div>
            </div>
          </div>
          <div class="side right">
            <div>63</div>
          </div>
          <div class="side">
            <div>3 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-3"></div>
            </div>
          </div>
          <div class="side right">
            <div>15</div>
          </div>
          <div class="side">
            <div>2 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-2"></div>
            </div>
          </div>
          <div class="side right">
            <div>6</div>
          </div>
          <div class="side">
            <div>1 star</div>
          </div>
          <div class="middle">
            <div class="bar-container">
              <div class="bar-1"></div>
            </div>
          </div>
          <div class="side right">
            <div>20</div>
          </div>
        </div>
    </div> 
             
        </main>

<?php }elseif($page=='additem'){
  

  $stmt2 = $con->prepare("SELECT * FROM cat  ");
    $stmt2->execute();
    $cc2=$stmt2->fetchAll(); 


     
      
  ?>
<div class="update">
      <h1>Add Product</h1>

      <form class="update  fv" action="stores.php?page=insert"  method="POST" 
      enctype="multipart/form-data">
      <label for="">Product name:</label>
      <input type="text" class="form-control" 
       name="proname" required >
       <label for="">Price:</label>
      <input type="text" class="form-control" 
       name="proprice" required >
       <label for="">Adress:</label>
      <input type="text" class="form-control" 
       name="address" required >
       <label for="">Phone:</label>
      <input type="text" class="form-control" 
       name="phone"  required>
       <label for="">Select a Photo:</label>
       <input type="file" class="form-control" 
       name="uploadfile"  required><br>

        <select class="form-select cs "  name="cats"
                aria-label=".form-select-lg example">
                <option selected disabled> __Select__ </option>"
                <?php foreach($cc2 as $name2)
                   echo "<option >" . $name2['catname'] . " </option>";
                   
                
               
                ?>
                     
        </select><br>

    
      <input type="submit" value="Add" name="addpro " class="btn btn-primary" >
       </form>
 </div>


<?php 

}elseif($page=='insert'){
ob_start();
  if($_SERVER['REQUEST_METHOD']=='POST'){

        $proname=$_POST['proname'];
        $proprice=$_POST['proprice'];
        $address=$_POST['address'];
        $phone=$_POST['phone'];
      
        $cats=$_POST['cats'];

          $filename=$_FILES["uploadfile"]["name"];
          $target=   $_FILES["uploadfile"]["tmp_name"];
          $folder="../img/" . $filename;
          move_uploaded_file($target,$folder);
          
     $xx = $con->prepare("SELECT catid FROM cat WHERE catname=? LIMIT 1");
     $xx->execute(array($cats));
     $catid=$xx->fetchAll();

  
  //$ids=$catid['catid']; 
  $ids=$catid[0][0];
  
 
         $stmt=$con->prepare("INSERT INTO 
                     `store`(`proname` ,`proprice`, `address` , `phone`,`photo`,`catid`) 
                      VALUES(:zname ,:zprice, :zadd  ,  :zphone , :zph , :zid)");

                  $stmt->execute(array(

                    'zname'=> $proname,
                    'zprice'=> $proprice,
                    'zadd'=> $address,
                    'zphone'=> $phone,
                    'zph'=> $folder,
                    'zid'=>$ids

                    
                  ));
            
               header('Location: stores.php');
               exit();
		

          
         
           
      
     
         

                
            }
  
 ?> 
  
<?php }elseif($page=='update'){
  
  
  $proids=$_GET['proid'];
 $des = $con->prepare("SELECT * FROM store WHERE proid=$proids ");
    $des->execute();
    $pro= $des->fetchAll();
 

    
  ?>

<div class="update">
      <h1>Update product page</h1>

      <form class="update" action="<?php $_SERVER['PHP_SELF']?>"  method="POST" enctype="multipart/form-data">
      <label for="">Product name:</label>
      <input type="text" class="form-control" 
       name="proname" value="<?php echo  $pro['0']['proname'];?>" >
       <label for="">Product price:</label>
      <input type="text" class="form-control" 
       name="proprice" value="<?php echo  $pro['0']['proprice'];?>" >
       <label for="">Adress:</label>
      <input type="text" class="form-control" 
       name="address" value="<?php echo $pro['0']['address']?>" >
       <label for="">Phone:</label>
      <input type="text" class="form-control" 
       name="phone" value="<?php echo $pro['0']['phone']?>" >
        <label for="">Select a Photo:</label>
       <input type="file" class="form-control" 
       name="up"  required><br>

        
          
  
   
             
    
      <input type="submit" value="Update" name="updates " class="btn btn-primary" >
       </form>
 </div>


?>
<?php 


     if($_SERVER['REQUEST_METHOD'] == 'POST' ){
       
        $proname=$_POST['proname'];
        $proprice5=$_POST['proprice'];
        $address2=$_POST['address'];
        $phone2=$_POST['phone'];

        
        $file=$_FILES["up"]["name"];
        $tar=$_FILES["up"]["tmp_name"];
        $fold="../img/" . $file;
        move_uploaded_file($tar,$fold);
         
             

        $stmtsvx=$con->prepare("UPDATE `store` SET `proname`=?, `proprice`= ? , address=?, 
        `phone`=? , `photo`=? WHERE proid=?");
        $stmtsvx->execute(array($proname ,$proprice5,$address2 ,$phone2,$fold,$proids));
        

        sleep(2);
        echo "Updated success";
         header('Location: stores.php');
               exit();
        
   
         
     }
?>
<?php }elseif($page=='delete'){
  
  
  
$idde=$_GET['proid'];
 $de = $con->prepare("SELECT * FROM store WHERE proid=$idde ");
    $de->execute();
    $count= $de->rowCount();
          

    if( $count>0)
       {
        $delete=$con->prepare("DELETE  from store  WHERE proid=$idde LIMIT 1");
         $delete->execute();
        sleep(1);
      header('Location: stores.php');
      exit();
     
       }
  
  ?>

  
<?php  }?>



 <?php
}

include 'footer.php';
?>
