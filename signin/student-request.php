<?php
	  include("../includes/config.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- BOOTSTRAP -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
		<link rel="stylesheet" href="../bootstrap/bootstrap.min.css" />
		<!-- fontawesome -->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
		<!-- local css -->
		<link rel="stylesheet" href="../css/request.css" />
		<title>Request Account</title>
	</head>

	<body>
		<!-- CONTAINER NO MARGIN -->
		<div class="bg overflow-hidden">
			<!-- CONTAINER WITH MARGIN -->
			<div class="container mt-5">
				<!-- PARENT -->
				<div class="row">
					<!--CHILD LEFT -->
					<div class="col-6" id="left-side">
						<form id="student-request-form" class="p-3" action="reg-Student.php" method="POST">
							<!-- HEADING -->
							<div class="title mb-5">
								<h3 class="mb-4">
									Student Request Form
									<span>
										<a class="role" id="active" href="#"><i class="fas fa-user-graduate"></i></a>
										<a class="role" href="staff-request.php"><i class="fas fa-user-tie"></i></a>
									</span>
								</h3>
							</div>
							<!-- HEADING END -->

							<!-- INPUT FIELDS -->
							<!-- FIRSTNAME -->
							<div class="row mb-3">
								<label for="first-name" class="col-sm-4 col-form-label">First Name</label>
								<div class="col-sm-8">
									<input type="text" name="firstname" class="form-control" id="first-name" placeholder="Enter Firstname" autocomplete="off" required/>
								</div>
							</div>

							<!-- LASTNAME -->
							<div class="row mb-3">
								<label for="last-name" class="col-sm-4 col-form-label">Last Name</label>
								<div class="col-sm-8">
									<input type="text" name="lastname" class="form-control" id="last-name" placeholder="Enter Lastname" autocomplete="off" required />
								</div>
							</div>
							
							<!-- CONTACT NO. -->
							<div class="row mb-3">
								<label for="last-name" class="col-sm-4 col-form-label">Contact No.</label>
								<div class="col-sm-8">
									<input type="text" name="contact" class="form-control" id="last-name" placeholder="Enter Contact No." maxlength="11" autocomplete="off"/>
								</div>
							</div>

							<!-- Email -->
							<div class="row mb-3">
								<label for="email" class="col-sm-4 col-form-label">Email</label>
								<div class="col-sm-8">
									<input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address" autocomplete="off" required/>
								</div>
							</div>

							<!-- PASSWORD -->
							<div class="row mb-2">
								<label for="pass" class="col-sm-4 col-form-label">Password</label>
								<div class="col-sm-8">
									<input type="password" name="password" class="form-control" id="Password" placeholder="Enter Password" autocomplete="off" required />
								</div>
								<div class="text-center">
									<input type="checkbox" onclick="myFunction()"> Show Password
								</div>
								<div id="emailHelp" class="form-text text-end">Note: Password must be atleast 8 or more characters!</div>
							</div>
							
							<!-- DEPARTMENT -->
							<div class="row mb-3">
								<label for="department" class="col-sm-4 col-form-label">Department</label>
								<div class="col-sm-8">
									<input class="form-control" name="department" list="departments" id="department" placeholder="Select Department" autocomplete="off" required/>
									<datalist id="departments">
									<?php
										$sql2 = mysqli_query($connection, "SELECT * From tblcollege");  
										// Use select query 
			
										while($fa = mysqli_fetch_array($sql2))
										{
											$getIdCollege = $fa['id'];
											echo "<option>" . $fa['college'] ."</option>";  
											// displaying data in option menu
										}	
										$getIdCollege;
									?>  
									<input class="form-control" name="idcol" value="<?php echo $getIdCollege ?>" hidden/>
									</datalist>
								</div>
							</div>

							<!--COURSE AND YEAR LEVEL-->
							<div class="row mb-3">
								<label for="admin-email" class="col-sm-4 col-form-label">Course & Year</label>
								<div class="col-sm-4">
									<input class="form-control" name="coursecode" id="coursecode" placeholder="Select Course" list="courses" autocomplete="off" required/>
									<datalist id="courses">
										<?php
											$sql3 = mysqli_query($connection, "SELECT * From tblcourse");  
											// Use select query 
				
											while($fa = mysqli_fetch_array($sql3))
											{
												echo "<option value='".$fa['coursecode']."'></option>";  
													// displaying data in option menu
												
											}	
										?>  
									</datalist>
								</div>
								<!--YEAR LEVEL-->
								<div class="col-sm-4">
									<input class="form-control" name="yearlevel" list="year-levels" id="year" placeholder="Select Year Level" autocomplete="off" required/>
									<datalist id="year-levels">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</datalist>
								</div>
							</div>
							
							<!--STATUS-->
							<div class="row mb-3">
								<label for="status" class="col-sm-4 col-form-label">Status</label>
								<div class="col-sm-8">
									<input class="form-control" name="status" list="status-options" id="status" placeholder="Select Status" autocomplete="off" required />
									<datalist id="status-options">
										<option value="Old Student"></option>
										<option value="New Student"></option>
										<option value="Shiftee"></option>
										<option value="Transferee"></option>
									</datalist>
								</div>
							</div>

							<!--ADVISER NAME-->
							<div class="row mb-3">
							<label for="adviser_email" class="col-sm-4 col-form-label">Adviser Name</label>
								<div class="col-sm-8">
									<input class="form-control" name="adviser_email" list="adviser_emails" id="adviser_email" placeholder="Enter Adviser Name to be sent"autocomplete="off" required/>
									<datalist id="adviser_emails">
										<?php
										    $getcollege = mysqli_query($connection,"SELECT * FROM tblcollege WHERE id='$getIdCollege'");
										    while($sa = mysqli_fetch_array($getcollege))
										    {
										        $collegeid = $sa['id'];
										    }
										    
											$sql2 = mysqli_query($connection, "SELECT * From tbluser WHERE usertype='Adviser' and college_id_fk='$collegeid'");  
											// Use select query 
				
											while($fa = mysqli_fetch_array($sql2))
											{
												echo "<option value='".$fa['email']."'></option>";  
													// displaying data in option menu
												
											}	
										?>  
									</datalist>

								</div>
							</div>
							
							<!-- INPUT FIELDS END -->

							<!-- ACTION BUTTONS -->
							<div class="buttons">
								<a href="universal-signin.php" class="btn btn-secondary" id="back-btn">Back</a>
								<button type="submit" name="submit-request" class="btn btn-danger" id="submit-btn">Submit</button>
							</div>
							<!-- ACTION BUTTONS END -->
						</form>
					</div>
					<!-- CHILD LEFT END -->

					<!-- CHILD RIGHT -->
					<div class="col-6" id="right-side">
						<div class="bg-circle"></div>
						<div class="containr">
							<img src="../images/request.svg" alt="" />
						</div>
					</div>
					<!-- CHILE RIGHT END -->
				</div>
				<!-- PARENT END -->
			</div>
			<!-- MARGIN WITH CONTAINER END -->
		</div>
		<!-- CONTAINER NO MARGIN END -->

		<!-- ONLINE BOOTSTRAP JS -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
		<!-- OFFLINE BOOTSTRAP JS -->
		<script src="../bootstrap/bootstrap.min.js"></script>
		<script>
			function myFunction() {
				var x = document.getElementById("Password");
				if (x.type === "password") {
					x.type = "text";
				} else {
					x.type = "password";
				}
			}
    	</script>

	</body>
</html>
