<?php

session_start();

include('Class/AdminBack.php');

$adminBack = new AdminBack;

$adminid = $_SESSION['id'];
$adminemail =  $_SESSION['email'];

if ($adminid == null) {
    header('location: index.php');
}


if(isset($_GET['adminlogout'])){
    if ($_GET['adminlogout'] == 'logout') {
       $adminBack->Logout();
    }
 

}



?>



<?php include_once('include/head.php'); ?>
    <body class="sb-nav-fixed">
        <?php include('include/header.php'); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">

            <?php include('include/leftbar.php'); ?>

            </div>
            <div id="layoutSidenav_content">
                <main>

                    <?php

                    if ($views) {
                       if($views == 'dashboard'){
                          include('view/dashboard_view.php');
                      }elseif ($views == 'banner') {
                        include('view/banner_view.php');
                      }

                    }

                        


                    ?>

                </main>
     <?php include_once('include/script.php'); ?>