
<?php      

include '../cont.php';

  $st=$con->prepare('select * from cat');
  $st->execute();
  $cc=$st->fetchAll();

   

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" 
    rel="stylesheet">

    <title>DigiMedia - Creative SEO HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-digimedia-v1.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Pre-header Starts -->
  <div class="pre-header">
    <div class="container">
      <div class="row">
        <!-- <div class="col-lg-8 col-sm-8 col-7">
          <ul class="info">
            <li><a href="#"><i class="fa fa-envelope"></i>digimedia@company.com</a></li>
            <li><a href="#"><i class="fa fa-phone"></i>010-020-0340</a></li>
          </ul>
        </div> -->
        
  <!-- Pre-header End -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="<?php echo $_SERVER['PHP_SELF']?>" class="logo">
              <img src="assets/images/logo-v1.png" alt="dd">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <form class="d-flex cv" action="?page=search "
             enctype="multipart/form-data" method="POST">
              <input class="form-control me-2" name="search" type="text"  aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

 
  <div id="about" class="about section">
    <div class="container">
      <div class="row">
<div class="col-lg-12">
    <div id="portfolio" class="our-portfolio section">
        <div class="container">
        <div class="row">
            <div class="col-lg-5">
            <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
                <h6>Our Shop</h6>
                <h4>See Our Recent <em>Products</em></h4>
                <div class="line-dec"></div>
            </div>
            </div>
        </div>
        </div>
        
        <div class="container-fluid wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
        <div class="row">
            <div class="col-lg-12">
              <!-- ********** start of col12 **********-->
              <?php 
               $page='';
      if(isset($_GET['page'])){
          $page=$_GET['page'];
          
      }else{
          $page='cats';
        
      }
      if($page=='cats'){


?>
             <div class="loop owl-carousel">
                <?php
                foreach($cc as $cat){
                 // echo $cat['catname'];
                ?>
              <div class="itemss">
                    <a href="#">
                        <div class="portfolio-item">
                        <a class="thumb" href="?page=showpro&&catid=<?php echo $cat['catid']; ?>">
                        <img src="assets/images/portfolio-04.jpg" alt="">
                        </a>
                        <div class="down-content">
                        <h4><a href="?page=showpro&&catid=<?php echo $cat['catid']; ?>"><?php echo $cat['catname']?></a></h4>
                        <!--<span>Marketing</span>-->
                        </div>
                    </div>
                  </a>  
               </div>
             <?php };?>
              </div>
        <?php }elseif($page=='showpro'){ 
          
          
          
          $page=$_GET['catid'];
                 //$id=$_GET['page'];
        
        $s2=$con->prepare("Select * from store WHERE catid=$page" );
        $s2->execute();
        $ss=$s2->fetchAll();

          
          ?>

          <a class="btn btn-secondary" href="Publicwebsite.php"> Categories</a>

                 <div class="loop owl-carousel">
                <?php
                foreach($ss as $cat){
                 // echo $cat['catname'];
                ?>
              <div class="itemss">
                    <a href="#">
                    <div class="portfolio-item">
                        <div class="thumb">
                        <img src="<?php echo $cat['photo']; ?>" alt="">
                        </div>
                        <div class="down-content">
                        <h4><a href="#"><?php echo $cat['proname']?></a></h4>
                        <span class=""><?php echo $cat['proprice']?> $</span>
                        </div>
                    </div>
                  </a>  
               </div>
             <?php };?>
           </div>  











          <?php }elseif($page=='search'){



            if(isset($_POST['search'])){

            $tt=$_POST['search'];
            
                  
            $statment=$con->prepare("SELECT * FROM `store` WHERE `proname`='$tt' " );

            $statment->execute();
             $sd=$statment->rowCount();
             if($sd>0){
              $last=$statment->fetchAll();
             
             }else{
              header('Location: Publicwebsite.php?page=error&&error=This product is not exist');
              exit();
            }
          }
          
            ?>
          
    
      <a class="btn btn-secondary" href="Publicwebsite.php"> Categories</a>

                 <div class="loop owl-carousel">
                <?php
                foreach($last as $cats){
                 // echo $cat['catname'];
                ?>
              <div class="itemss">
                    <a href="#">
                        <div class="portfolio-item">
                        <div class="thumb">
                        <img src="<?php echo $cats['photo']; ?>" alt="">
                        </div>
                        <div class="down-content">
                          <h4><a href="#"><?php echo $cats['proname']?></a></h4>
                          <span class=""><?php echo $cats['proprice']?> $</span>
                        </div>
                    </div>
                  </a>  
              </div>
             <?php };?>
           </div> 




            


          <?php }elseif($page=='error'){ ?>
            <h1> <?php echo $_GET['error'];?></h1>
            <?php } ?>
          <!-- ********** end of col12 ************-->
        </div>
     
    </div>
  </div>
    <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2022 DigiMedia Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/owal.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/cus.js"></script>
</body>
</html>