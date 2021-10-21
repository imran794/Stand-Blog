

  <?php include('includes/head.php'); ?>

  <body>

    <!-- ***** Preloader Start ***** -->
    <?php include('includes/preloader.php'); ?>
     
    <!-- ***** Preloader End ***** -->

    <?php include('includes/header.php'); ?>
   

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <?php include('includes/banner.php'); ?>
    <!-- Banner Ends Here -->
   <?php include('includes/download.php'); ?>
    


    <section class="blog-posts">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <?php include('includes/blog.php'); ?>
           
          </div>
          <div class="col-lg-4">
            <?php include('includes/sidebar.php'); ?>
          </div>
        </div>
      </div>
    </section>

    
 <?php include_once('includes/script.php'); ?>