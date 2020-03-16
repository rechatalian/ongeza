<?php 
ob_start();
ini_set('session.cookie_httponly', true);
require('includes/header.php');
require('includes/config.php');
require('includes/functions.php');
?>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xs-12 col-sm-10 col-md-8">
				
				<div class="card mt-5">
					<div class="card-header">Add new customer</div>
					<div class="card-body">
						<form method="POST" action="<?php echo noHTML($_SERVER['PHP_SELF']); ?>" role="form" onsubmit="return validate();">	 
							
							<div class="form-group row">
								<label for="firstname" class="col-md-4 col-form-label text-md-right">First name</label>
								<div class="col-md-6">
									<input type="text" id="firstname" name="firstname" class="form-control input-sm" placeholder="First name" value="<?php echo isset($_POST["firstname"]) ? $_POST["firstname"] : ''; ?>">
								</div>
							</div>

							<div class="form-group row">
								<label for="lastname" class="col-md-4 col-form-label text-md-right">Last name</label>
								<div class="col-md-6">
									<input type="text" id="lastname" name="lastname" class="form-control input-sm" placeholder="Last name" value="<?php echo isset($_POST["lastname"]) ? $_POST["lastname"] : ''; ?>">
								</div>
							</div>

							<div class="form-group row">
								<label for="town_name" class="col-md-4 col-form-label text-md-right">Town name</label>
								<div class="col-md-6">
									<input type="text" name="town_name" id="town_name" class="form-control input-sm" placeholder="Town name" value="<?php echo isset($_POST["town_name"]) ? $_POST["town_name"] : ''; ?>">
								</div>
							</div>

							<div class="form-group row">
								<label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
								<div class="col-md-6">
									<select name="gender" id="gender" class="form-control">
										<option>Select gender</option>
										<?php 
										$result = getAllGender();
										while ($rows = mysqli_fetch_assoc($result)) { ?>
											<option <?php isset($_POST['gender_name']) == $rows['gender_name'] ? 'selected' : '' ?> value="<?php echo $rows['id'] ?>"><?php echo $rows['gender_name'] ?></option>
										<?php } ?>
									</select>
								</div>                         
							</div>

							<div class="form-group row mb-0" id="show-hide">
								<div class="col-md-6 offset-md-4">
									<p id="message" style="color: red;"></p>
								</div>
							</div>
							
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-success" name="register">Register</button>
								</div>
							</div>                    
						</form> 
					</div>
				</div>
			</div>
		</div>

<?php

if (strtoupper($_SERVER['REQUEST_METHOD'])==='POST'){
	if (isset($_POST['register'])){
		$firstname = trim($_POST['firstname']);
	    $lastname = trim($_POST['lastname']);
	    $town_name = trim($_POST['town_name']);
		$gender = $_POST['gender'];	   
		
	    $firstname = mysqli_real_escape_string($conn, $firstname);
	    $lastname = mysqli_real_escape_string($conn, $lastname);
	    $town_name = mysqli_real_escape_string($conn, $town_name);
	    $gender = mysqli_real_escape_string($conn, $gender);

		if (!customerExists($firstname, $lastname, $town_name)) {				
			if (insertCustomer($firstname, $lastname, $town_name, $gender) == 1) {
				header('Location: index.php');
				exit();
			}		
		} else {
			echo '<div class="alert alert-warning alert-dismissable" id="flash-msg">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				<i class="icon fa fa-check"></i><strong>Duplicate! </strong>Customer details already exists</div>';
		}	
	}
}

ob_end_flush();
?>

	</div>	
<?php
require('includes/footer.php');
?>
