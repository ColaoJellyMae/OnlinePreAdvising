<?php
	include("../../includes/logout.php");
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
		<link rel="stylesheet" href="../../css/style-superadmin.css" />

		<title>Super Admin</title>
	</head>

	<body>
		<!-- NAVBAR -->
		<nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
			<div class="container-fluid">
				<!-- ICS LOGO -->
				<a class="navbar-brand p-0 m-0" href="#" id="nav-logo">
					<img class="rounded-circle p-0" src="../../images/wmsu-seal.png" alt="WMSU SEAL" width="32" height="32" />
					<span id="department">Western Mindanao State University</span>
				</a>

				<!-- MOBILE TOGGLE -->
				<button class="navbar-toggler m-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span><i class="fas fa-bars"></i></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<!-- Profile -->
						<!-- <li class="nav-item">
							<a class="nav-link active py-0" aria-current="page" href="superadmin-myprofile.php "><i id="icons" class="fas fa-user-tie"></i><span class="nav-label"> My Profile</span></a>
						</li> -->
						<!-- Home -->
						<li class="nav-item">
							<a class="nav-link active py-0" aria-current="page" href="superadmin-homepage.php "><i id="icons" class="fas fa-home"></i><span class="nav-label"> Home</span></a>
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
						<img id="picture" src="../../images/superadmin.svg" alt="super admin" />
						
					</div>
				</div>
				<div class="col-6 g-5" id="right-side">
					<h1 class="text fw-bold fs-1 text-center mt-3 mb-5">Hello, <span class="text-danger">Super Admin</span></h1>
					<a class="btn btn-danger w-100 round mb-3 text-white fs-2" href="superadmin-departments.php ">Departments
						<span id="icon-btn"><i class="fas fa-building"></i></span>
					</a>
					<a class="btn btn-danger w-100 round mb-3 text-white fs-2" href="superadmin-admins.php ">Admin Accounts
						<span id="icon-btn"><i class="fas fa-users"></i></span>
					</a>
				</div>
			</div>
			
		</div>

		
		<!-- CONTENT END -->

		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	</body>
</html>
