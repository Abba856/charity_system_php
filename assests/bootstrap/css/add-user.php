<?php require_once 'includes/header.php'; ?>
<?php


if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $InsertQuery ="INSERT INTO `register`(`email`,`password`)VALUES('$email','$password')";
    if(mysqli_query($connect, $InsertQuery)){
         echo "User Addded Successfully";
    }else{
        echo "User Added Fails";
    }
}


?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>	Add User
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
            <form action="#" method="POST" class="form-horizontal">
					<fieldset>
						<legend>Add User</legend>
						<div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Username</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="email" placeholder="Email" required="">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="npassword" class="col-sm-2 control-label">password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required="">
					    </div>
					  </div>


					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
					      <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Add User </button>
					      
					    </div>
					  </div>


			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>
<!-- /row -->

<script src="custom/js/report.js"></script>

<?php require_once 'includes/footer.php'; ?>