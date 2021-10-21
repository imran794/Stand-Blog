<?php

$adminBack = new AdminBack;

$all_category = $adminBack->ManageCategory();

if (isset($_GET['delete'])) {
    $Catid = $_GET['id'];
    if ($_GET['delete'] == 'catdelete') {
       $msg =   $adminBack->DeleteCategory($Catid);
    }
}


?>


<div class="card-body">
    <h2 style="margin-bottom: 30px;">Manage Category</h2>
          <?php if (isset($msg)) {
     echo $msg;
        } ?>

            <table class="table">
                 <thead>

                     <tr>
                         <td>ID</td>
                         <td>Category Name</td>
                         <td>Category Description</td>
                         <td>Status</td>
                         <td>Action</td>
                     </tr>

               <?php while ($catecory= mysqli_fetch_assoc($all_category)) { ?>

                     <tr>
                         <td><?php echo $catecory['id']; ?></td>
                         <td><?php echo $catecory['category_name']; ?></td>
                         <td><?php echo $catecory['Category_des']; ?></td>
                         <td><?php echo $catecory['status']; ?></td>
                         <td>
                             <a href="edit.php?status=edit&&id=<?php echo $catecory['id']; ?>" class="btn btn-primary" title="">Edit</a>
                             <a href="?delete=catdelete&&id=<?php echo $catecory['id']; ?>" title="" class="btn btn-danger">Delete</a>
                         </td>
                     </tr>
                     <?php } ?>
                 
                 </thead>
             </table>
    
</div>
   
                 