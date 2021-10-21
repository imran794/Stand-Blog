<?php

$adminBack = new AdminBack;

$all_category = $adminBack->ManageCategory();

if (isset($_POST['banner_btn'])) {
   $msg= $adminBack->AddBanner($_POST);
}


?>


<div class="card-body">
    <h2 style="margin-bottom: 30px;">Add Banner</h2>
          <?php if (isset($msg)) {
     echo $msg;
        } ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Banner Image</label>
            <input class="form-control" id="inputEmailAddress" name="banner_image" type="file" />
        </div>
        <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Category Name</label>
           <select name="cat_id" class="form-control">
           	 <option value="">Select Category</option>
           	<?php while($category=mysqli_fetch_assoc($all_category)) { ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['category_name']; ?></option>
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Banner Title</label>
            <input class="form-control" id="inputEmailAddress" name="banner_title" type="text" placeholder="Banner Title" />
        </div>
        <div class="form-group">
            <label class="small mb-1" for="inputPassword">Category Status</label>
             <select name="status" class="form-control">
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>

        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <input type="submit" name="banner_btn" value="Add Banner" class="btn btn-primary">
      
        </div>
    </form>
</div>