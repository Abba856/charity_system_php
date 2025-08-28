<?php 
require_once 'php_action/db_connect.php';

session_start();



$errors = array();

if($_POST) {		

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$addr = $_POST['addr'];
	$contact = $_POST['contact'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];

	if(empty($firstname) || empty($lastname) || empty($email) || empty($addr) || empty($contact) || empty($password) || empty($cpassword)) {
		if($firstname == "") {
			$errors[] = "Firstname is required";
     } 
    if($lastname == "") {
			$errors[] = "Lastname is required";
		} 
		if($email == "") {
			$errors[] = "email is required";
		} 
		if($addr == "") {
			$errors[] = "Address is required";
		} 
		if($contact == "") {
			$errors[] = "Contact is required";
		} 
		if($password == "") {
			$errors[] = "Password is required";
		}
		if($cpassword  == "") {
			$errors[] = "Confrim-Password is required";
		}elseif($password !== $cpassword){
			$errors[] = "password doesn't match";
		}
	} else{
		$password = md5($password);
		$sql = "INSERT INTO `register`(`firstname`, `lastname`, `email`, `addr`, `contact`, `password`) VALUES ('$firstname','$lastname','$email','$addr','$contact','$password')";
		if(mysqli_query($connect,$sql)){

		header("location: index.php");
	}else{
		$errors[] = "Failed To registered";
	}
}
}
// /if $_POST
?>

<!DOCTYPE html>
<html>
<head>
	<title>Stock Management System</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">	

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url(assests/images/cart.jpg); background-repeat: no-repeat; background-size:cover;">
	<div class="container">
		<div class="row vertical">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Please Sign Up</h3>
					</div>
					<div class="panel-body">

						<div class="messages">
							<?php if($errors) {
								foreach ($errors as $key => $result) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$result.'</div>';										
									}
								} ?>
						</div>

						<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="registerForm">
							<fieldset>
							  <div class="form-group">
									<label for="username" class="col-sm-2 control-label">Firstname</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" autocomplete="off" />
									</div>
								</div>
								<div class="form-group">
									<label for="password" class="col-sm-2 control-label">Lastname</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="lastname" autocomplete="off" />
									</div>
								</div>		
                                <div class="form-group">
									<label for="password" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
									  <input type="email" class="form-control" id="email" name="email" placeholder="email" autocomplete="off" />
									</div>
								</div>	
                                <div class="form-group">
									<label for="password" class="col-sm-2 control-label">Address</label>
									<div class="col-sm-10">
									  <input type="text" class="form-control" id="addr" name="addr" placeholder="Address" autocomplete="off" />
									</div>
								</div>
                                <div class="form-group">
									<label for="password" class="col-sm-2 control-label">Contact</label>
									<div class="col-sm-10">
									  <input type="number" class="form-control" id="contact" name="contact" placeholder="contact" autocomplete="off" />
									</div>
								</div>
                                <div class="form-group">
									<label for="password" class="col-sm-2 control-label">password</label>
									<div class="col-sm-10">
									  <input type="password" class="form-control" id="password" name="password" placeholder="password" autocomplete="off" />
									</div>
								</div>
                                <div class="form-group">
									<label for="password" class="col-sm-2 control-label">Confirm-password</label>
									<div class="col-sm-10">
									  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="confirm-password" autocomplete="off" />
									</div>
								</div>										
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
									  <button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i> Register</button>
										<p>Already Have An Account <a href="index.php"> Sign-In</a></p> 
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<!-- panel-body -->
				</div>
				<!-- /panel -->
			</div>
			<!-- /col-md-4 -->
		</div>
		<!-- /row -->
	</div>
	<!-- container -->	
</body>
</html>







	