<?php

$adminBack = new AdminBack;

$allbanner = $adminBack->ManageBanner();



?>


<div class="card-body">
    <h2 style="margin-bottom: 30px;">Manage Banner</h2>
          <?php if (isset($msg)) {
     echo $msg;
        } ?>

            <table class="table">
                 <thead>

                     <tr>
                         <td>ID</td>
                         <td>Image</td>
                         <td>Category</td>
                         <td>Title</td>
                         <td>Status</td>
                         <td>Action</td>
                     </tr>

               <?php while ($banner= mysqli_fetch_assoc($allbanner)) { ?>

                     <tr>
                         <td><?php echo $banner['id']; ?></td>
                         <td>
                             <img width="100" src="upload/bannerimage/<?php echo $banner['banner_image'];   ?>" alt="">
                         </td>
                         <td><?php echo $banner['cat_id']; ?></td>
                         <td><?php echo $banner['banner_title']; ?></td>
                         <td><?php echo $banner['status']; ?></td>
                         <td>
                             <a href="edit.php?status=edit&&id=<?php echo $banner['id']; ?>" class="btn btn-primary" title="">Edit</a>
                             <a href="?delete=catdelete&&id=<?php echo $banner['id']; ?>" title="" class="btn btn-danger">Delete</a>
                         </td>
                     </tr>
                     <?php } ?>
                 
                 </thead>
             </table>
    
</div>
   
                 