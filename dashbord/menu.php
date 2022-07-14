

<?php 
include '../cont.php';
 $stmtd = $con->prepare("SELECT * FROM `admin` ");
                    $stmtd->execute();
                    $cc=$stmtd->fetchAll();
                   // echo $cc['0']['adname'];
?>





 <div class="links sticky-top">
        
         <div class="logo">
                   <img class="" src="admin.png">
                   <span class="logoname" style="color: #0d6efd;font-weight: bolder;"><?php echo $cc['0']['adname'];?></span>
                   <div class="dbt">
                    <i class="fa fa-bars" id="btns"></i>
                   </div>
                     
                       
                   
                   
                  
         </div>

                <div class="content">
                    <ul class="nav-list">
                            <li class="nav-item lm  " >
                                <a href="dashbord.php" >
                                    <i class="fa-solid fa-house-chimney"></i>
                                Dashbord</a> 
                            </li>

                             <li class="nav-item lm">
                                 <a href="Categories.php">
                                     <i class="fa-solid fa-align-justify"></i>Categories</a> 
                            </li>

                            <li class=" nav-item lm"> <a href="stores.php"><i class="fa-brands fa-product-hunt"></i>Stores</a>
                            </li>

                           

                       


           
                      
                    </ul>
                </div>
      </div>