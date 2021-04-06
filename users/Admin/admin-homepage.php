<?php
	session_start();
	include("../../includes/logout.php");
	include("../../includes/config.php");

	$user_check = $_SESSION['login_user'];
	$query1 = mysqli_query($connection, "SELECT * FROM tblusers WHERE username = '$user_check'");

	$college_check = $_SESSION['collegeid'];

	$query2 = mysqli_query($connection, "SELECT * FROM tblcollege WHERE id = ' $college_check'");

   // Use select query 
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- BOOTSTRAP -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.css" />
		<!-- OFFLINE BOOTSTRAP -->
		<link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />

		<!-- fontawesome -->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
		<link rel="stylesheet" href="../../bootstrap/fontawesome.min.css">
		<!-- local css -->
		<link rel="stylesheet" href="../../css/style-admin.css" />

		<title>Home</title>
	</head>

	<body>
		<!-- NAVBAR -->
		<nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
			<div class="container-fluid">
				<!-- COLLEGE LOGO/SEAL -->
				<a class="navbar-brand p-0 m-0" href="#" id="nav-logo">

					<?php 
						while($getseal = mysqli_fetch_array($query2))
						{
							$college_check = $getseal['id'];

							$getdata = mysqli_query($connection, "SELECT seal FROM tblcollege WHERE id ='$college_check'");

							while($fa = mysqli_fetch_array($getdata))
							{
								echo '<img class="rounded-circle p-0"  src="../../upload/'.$fa['seal'].'" alt="COLLEGE SEAL" width="32" height="32">';
							}
						}

						while($getcollege = mysqli_fetch_array($query1))
						{ 
							$college_check = $getcollege['collegeid'];

							$getdata = mysqli_query($connection,"SELECT college FROM tblcollege WHERE id='$college_check'");

							while($fa = mysqli_fetch_array($getdata))
							{
								echo "<span id='department'>  ".$fa['college']."</span>";
							}
						}							
					?> 
				</a>

				

				<!-- MOBILE TOGGLE -->
				<button class="navbar-toggler m-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span><i class="fas fa-bars"></i></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<!-- Profile -->
						<li class="nav-item">
							<a class="nav-link active py-0" aria-current="page" href="admin-myprofile.php"><i id="icons" class="fas fa-user-tie"></i><span class="nav-label"> My Profile</span></a>
						</li>
						<!-- Home -->
						<li class="nav-item">
							<a class="nav-link active py-0" aria-current="page" href="#"><i id="icons" class="fas fa-home"></i><span class="nav-label"> Home</span></a>
						</li>
						<!-- notifications -->
						<li class="nav-item dropstart">
							<a class="nav-link dropstart active py-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i id="icons" class="fas fa-bell"></i><span class="badge rounded-pill bg-info text-white align-text-top" id="notif-number">4</span><span class="nav-label"> Notifications</span> </a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li>
									<a data-bs-toggle="modal" data-bs-target="#manage-request" class="dropdown-item" href="#"><span class="text fw-bold" >Adviser One</span> requested an account</a>
								</li>
								<li>
									<a data-bs-toggle="modal" data-bs-target="#manage-request" class="dropdown-item" href="#"><span class="text fw-bold">Adviser Two</span> requested an account</a>
								</li>
								<li>
									<a data-bs-toggle="modal" data-bs-target="#manage-request" class="dropdown-item" href="#"><span class="text fw-bold">Adviser Three</span> requested an account</a>
								</li>
								<!-- <li><hr class="dropdown-divider" /></li> -->
								
							</ul>
						</li>
						<!-- logout -->
						<li class="nav-item">
							<a type="button" id="icons" class="nav-link active py-0" data-bs-toggle="modal" data-bs-target="#logoutmodal" aria-disabled="true"><i class="fas fa-sign-out-alt"></i><span class="nav-label"> Logout</span></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END OF NAVBAR -->

		<!-- CONTENT -->
		<div class="container container-fluid mt-5">
			<div class="row pt-5">
				<div class="col-6 mt-5" id="left-side">
					<div class="col-6" >
						<img id="picture" src="../../images/rocket.svg" alt="rocket" />
					</div>
				</div>
				<div class="col-6 g-5" id="right-side">
					<h1 class="text text-center fw-bold mt-1 mb-4">Hello, <span class="text-danger">
					
					<?php 
							$id =$_SESSION['collegeid'];
							$getdata = mysqli_query($connection,"SELECT collegeshort FROM tblcollege WHERE id='$id'");

							while($fa = mysqli_fetch_array($getdata))
							{
								echo "<span id='department'>".$fa['collegeshort']."</span>";
							}
					?>

					</span> Admin</h1>

					<a class="btn btn-danger w-100 round mb-3  fs-4" href="admin-curriculum.php">
						<span id="icon-btn"><i class="fas fa-th-list"></i></span>
						Curriculum
					</a>
					<a class="btn btn-danger w-100 round mb-3  fs-4" href="admin-subjects.php">
						<span id="icon-btn"><i class="fas fa-book"></i></span>
						Subjects
					</a>
					<a class="btn btn-danger w-100 round mb-3 fs-4" href="admin-sections.php">
						<span id="icon-btn"><i class="fas fa-users"></i></span>
						Sections
					</a>
					<a class="btn btn-danger w-100 round mb-3 fs-4" href="admin-advisers.php">
						<span id="icon-btn"><i class="fas fa-user-friends"></i></span>
						Adviser Lists
					</a>
				</div>
			</div>
			
		</div>

		<!-- REQUEST POPUP -->
		<div class="container container-fluid">
			<div class="modal fade" id="manage-request" tabindex="-1" aria-labelledby="manage-requestLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title fw-bold" id="manage-requestLabel">Adviser Account Request</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
	
						<div class="modal-body">
							<!-- Inputs -->
							<form>
								<div class="mb-3">
									<label for="input-name" class="form-label">Name</label>
									<input type="text" class="form-control" id="input-name" aria-describedby="input-name-help" 
										value="Juan Dela Cruz"
									readonly>
									<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
								</div>
	
								<div class="mb-3">
									<label for="input-id" class="form-label">Employee ID</label>
									<input type="text" class="form-control" id="input-id" 
										value="EMP3000"
									readonly>
								</div>

								<div class="mb-3">
									<label for="input-email" class="form-label">Email</label>
									<input type="email" class="form-control" id="input-email" 
										value="emp3000@wmsu.edu.ph"
									readonly>
								</div>

								<div class="mb-3">
									<label for="input-advised" class="form-label">Advised To</label>
									<input type="text" class="form-control" id="input-advised" 
										value="BSCS1A"
									readonly>
								</div>
	
								<div align="right">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Delete</button>
									<button type="submit" class="btn btn-success">Approve</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- REQUEST END -->

		<!-- CONTENET END -->

		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	</body>
</html>
