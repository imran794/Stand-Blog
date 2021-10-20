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

}









?>