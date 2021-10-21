<?php

class AdminBack{

	private $conn;

	public function __construct()
	{
	 # Database Host, Database User, Database password, Database Name;

	$dbhost   = 'localhost';
	$dbuser   = 'root';
	$dbpass   = '';
	$dbname   = 'standblog';

	$this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	if (!$this->conn) {
		die('Databasr Connection Error!!');
	}


	}

	public function Login($data)
	{
		$email = $data['email'];
		$pass  = md5($data['password']);

		$query = "SELECT * FROM login WHERE email='$email' AND password='$pass'";

		if (mysqli_query($this->conn, $query)) {
			$datainfo = mysqli_query($this->conn, $query);
			$data = mysqli_fetch_assoc($datainfo);

			if ($data) {
				header('location: dashboard.php');

				session_start();

				$_SESSION['id']           = $data['id'];
				$_SESSION['email']        = $data['email'];
				$_SESSION['password']     = $data['password'];
			}
			else{
				$msg = 'Your User Name or Password is Incorrect!';
	 	 	 	 return $msg;
			}
		}
	}

	public function Logout()
	{
	   unset($_SESSION['id']);
	   unset($_SESSION['email']);
	   unset($_SESSION['password']);
	   header('location: index.php');
	}

	public function Register($data)
	{
		$firstname   = $data['first_name'];
		$lastname    = $data['last_name'];
		$email       = $data['email'];
		$pass        = md5($data['password']);

		$get_email = "SELECT * FROM login WHERE email='$email'";
		$send_data = mysqli_query($this->conn, $get_email);
		$datainfo = mysqli_num_rows($send_data);

		if ($datainfo == 1) {
		   return $msg = 'The Email alradey Exisits!';
		}
		else{
			$query = "INSERT INTO login(first_name,last_name,email,password) VALUE('$firstname','$lastname','$email','$pass')";

		if (mysqli_query($this->conn,$query)) {

			$register = mysqli_query($this->conn,$query);
			$msg = 'User Register Successfully!';
	 		return $msg;
		}

		}

		
	}

	public function AddCategory($data)
	{
		$Categoryname = $data['category_name'];
		$Category_des = $data['Category_des'];
		$status       = $data['status'];

		$query = "INSERT INTO category(category_name,Category_des,status) VALUE('$Categoryname','$Category_des',$status)";

		if (mysqli_query($this->conn, $query)) {
			$msg = "Category Insert Successfully!!";
			return $msg;
		}
	}

	public function ManageCategory()
	{
		$query = "SELECT * FROM category ORDER BY id DESC";
		if (mysqli_query($this->conn, $query)) {
			$allcategory = mysqli_query($this->conn, $query);
			return $allcategory;
		}
	}

	public function DeleteCategory($id)
	{
		$query = "DELETE FROM category WHERE id=$id";
		if (mysqli_query($this->conn,$query)) {
			$msg = "Category Delete Successfully!!";
			return $msg;
		}
	}

	public function EditCategory($id)
	{
		$query = "SELECT * FROM category WHERE id='$id'";
		if (mysqli_query($this->conn, $query)) {
			$allcategory = mysqli_query($this->conn, $query);
			$category = mysqli_fetch_assoc($allcategory);
			return $category;
		}
	}

	public function UpdateCategory($data)
	{
		$category_name = $data['category_name_up'];
		$category_des  = $data['Category_des_up'];
		$status        = $data['status_up'];
		$id        = $data['up_cat_id'];

		$query  = "UPDATE category SET category_name='$category_name', Category_des='$category_des',status=$status WHERE id=$id";

		if (mysqli_query($this->conn, $query)) {
		  $msg = "Category Update Successfully!!";
		  return $msg;
		}
	}

	public function AddBanner($data)
	{
		$bannerimage       = $_FILES['banner_image']['name'];
		$tempname          = $_FILES['banner_image']['tmp_name'];
		$cateId            = $data['cat_id'];
		$banner_title      = $data['banner_title'];
		$status            = $data['status'];

		$query = "INSERT INTO banner(banner_image,cat_id,banner_title,added,post_time,post_comment_count,status) VALUE('$bannerimage',$cateId,'$banner_title','admin',now(),5,$status)";

		if (mysqli_query($this->conn,$query)) {
			move_uploaded_file($tempname,'upload/bannerimage/' .$bannerimage);
			$msg = "Banner Insert Successfully!!";
			return $msg;
		}
	}

	public function ManageBanner()
	{
		$query = "SELECT * FROM banner ORDER BY id DESC";
		if (mysqli_query($this->conn,$query)) {
			$allbanner = mysqli_query($this->conn,$query);
			return $allbanner;
		}
	}



}









?>