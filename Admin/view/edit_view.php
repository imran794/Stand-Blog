<?php

$adminBack = new AdminBack();

if (isset($_GET['status'])) {
	$getId = $_GET['id'];
	if ($_GET['status'] == 'edit') {
		$category = $adminBack->EditCategory($getId);
	}
}

if (isset($_POST['cat_btn_up'])) {
	$msg = $adminBack->UpdateCategory($_POST);
}


?>


<div class="card-body">
    <h2 style="margin-bottom: 30px;">Add Category</h2>
          <?php if (isset($msg)) {
     echo $msg;
        } ?>
    <form action="" method="POST">
    	    <input type="hidden" name="up_cat_id" value="<?php  echo $category['id']; ?>">
        <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Category Name</label>
            <input class="form-control" id="inputEmailAddress" name="category_name_up" type="text" value="<?php echo $category['category_name']; ?>" />
        </div>
        <div class="form-group">
            <label class="small mb-1" for="inputPassword">Category Description</label>
            <textarea rows="4" class="form-control" name="Category_des_up" placeholder="Category Description"><?php echo $category['Category_des']; ?></textarea>
        </div> 

          <div class="form-group">
            <label class="small mb-1" for="inputPassword">Category Status</label>
             <select name="status_up" class="form-control">
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>

        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <input type="submit" name="cat_btn_up" value="Add Category" class="btn btn-primary">
      
        </div>
    </form>
</div>