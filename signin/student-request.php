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
							<div class="row mb-3">
								<label for="student-id" class="col-sm-4 col-form-label">Student ID</label>
								<div class="col-sm-8" >
									<input type="text" name="username" class="form-control" id="student-id" />
								</div>
							</div>
							<div class="row mb-3">
								<label for="first-name" class="col-sm-4 col-form-label">First Name</label>
								<div class="col-sm-8">
									<input type="text" name="firstname" class="form-control" id="first-name" />
								</div>
							</div>
							<div class="row mb-3">
								<label for="last-name" class="col-sm-4 col-form-label">Last Name</label>
								<div class="col-sm-8">
									<input type="text" name="lastname" class="form-control" id="last-name" />
								</div>
							</div>
							<div class="row mb-3">
								<label for="email" class="col-sm-4 col-form-label">Email</label>
								<div class="col-sm-8">
									<input type="email" name="email" placeholder="@wmsu.edu.ph" class="form-control" id="email" />
								</div>
							</div>
							<div class="row mb-3">
								<label for="pass" class="col-sm-4 col-form-label">Password</label>
								<div class="col-sm-8">
									<input type="password" name="password" placeholder="" class="form-control" id="pass" />
								</div>
							</div>
							<div class="row mb-3">
								<label for="department" class="col-sm-4 col-form-label">Department</label>
								<div class="col-sm-8">
									<!--
									<input class="form-control" name="department" list="departments" id="department" />
									<datalist id="departments">
									-->
									<select class="form-control" id="select-college" name="collegeid" required>
									<option selected></option>
									<?php
									    $getalldep = mysqli_query($connection, "SELECT * FROM tblcollege");

										while($fa=mysqli_fetch_array($getalldep))
										{
											echo "<option value='".$fa['id']."'>".$fa['college']."</option>";
										}
									?>
									</select>

									<!--
										<option value="College of Agriculture"></option>
										<option value="College of Achitecture"></option>
										<option value="College of Asian and Islamic Studies"></option>
										<option value="College of Criminal Justice Education"></option>
										<option value="College of Engineering"></option>
										<option value="College of Forestry and Environmental Studies"></option>
										<option value="College of Home Economics"></option>
										<option value="College of Law"></option>
										<option value="College of Liberal Arts"></option>
										<option value="College of Nursing"></option>
										<option value="College of Public Administration and Development Studies"></option>
										<option value="College of Sports Science and Physical Education"></option>
										<option value="College of Science and Mathematics"></option>
										<option value="College of Social Work and Community Development"></option>
										<option value="College of Teacher Education"></option>
										<option value="Institute of Computer Studies"></option>
									-->
									</datalist>
								</div>
							</div>
							<div class="row mb-3">
								<label for="course" class="col-sm-4 col-form-label">Course and Year</label>
								<div class="col-sm-4">
								<select class="form-control" id="select-college" name="courseid" required>
									<option selected>Select Course..</option>
									<?php
									    $getcourse = mysqli_query($connection, "SELECT * FROM tblcourse");

										while($fa=mysqli_fetch_array($getcourse))
										{
											echo "<option value='".$fa['id']."'>".$fa['course']."</option>";
										}
									?>
									</select>
								</div>
								<div class="col-sm-4">
									<input class="form-control" name="year" list="year-levels" id="year" placeholder="Year Level" />
									<datalist id="year-levels">
										<option value="1"></option>
										<option value="2"></option>
										<option value="3"></option>
										<option value="4"></option>
									</datalist>
								</div>
							</div>
							<div class="row mb-3">
								<label for="status" class="col-sm-4 col-form-label">Status</label>
								<div class="col-sm-8">
									<input class="form-control" name="status" list="status-options" id="status" placeholder="Old Student" />
									<datalist id="status-options">
										<option value="Old Student"></option>
										<option value="New Student"></option>
										<option value="Transferee"></option>
										<option value="Shiftee"></option>
									</datalist>
								</div>
							</div>
							<input type="hidden" name="student" value="student">
							<!-- INPUT FIELDS END -->

							<!-- ACTION BUTTONS -->
							<div class="buttons">
								<a href="universal-signin.php" class="btn btn-secondary" id="back-btn">Back</a>
								<button type="submit" name="add" class="btn btn-danger" id="submit-btn">Submit</button>
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

	</body>
</html>
