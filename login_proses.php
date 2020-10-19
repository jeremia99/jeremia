<!-- Begin Login Proses -->
<?php
	require 'db.php';
	//Login Proses
	if(isset($_POST['signin'])){
		$user 		= 	$_POST['username'];
		$pass 		= 	$_POST['password'];

		$hasil 		= 	mysqli_query($koneksi, "SELECT * FROM users WHERE username='$user' AND password='$pass'");
		$data 		= mysqli_fetch_assoc($hasil);
		// if (mysqli_num_rows($hasil) === 1) {
		// 	$data = mysqli_fetch_assoc ($result);
		// 	if (password_verify($pass, $data["password"]) ) {
			
		// 	$_SESSION ['login'] = true;
		// 	header("Location: admin.php");
		// 	exit;	
		// 	}
		
		$error = true;
		$id 		= 	$data['id'];
		$no_induk 	=	$data['nomor_induk'];
		$username 	= 	$data['username'];
		$password 	= 	$data['password'];
		$name 		= 	$data['name'];
		$foto 		= 	$data['foto'];
		$access 	= 	$data['access'];

		if($user==$username && $pass=$password){
			session_start();
			$_SESSION['id']			=	$id;
			$_SESSION['username']	=	$username;
			$_SESSION['name']		=	$name;
			$_SESSION['foto']  		=	$foto;
			$_SESSION['access']		=	$access;

			header('Location: dashboard/index.php');
		}
	}
?>
<!-- End Login Proses -->