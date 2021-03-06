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
    <link rel="stylesheet" href="../../css/style-admin.css" />

    <title>My Profile</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
        <div class="container-fluid">
            <!-- ICS LOGO -->
            <a class="navbar-brand p-0 m-0" href="#" id="nav-logo">
                <img class="rounded-circle p-0" src="../../images/ics-seal-250.png" alt="ICS SEAL" width="32" height="32" />
                <!-- Department -->
					<span id="department">Institute of Computer Studies</span>
            </a>

            <!-- MOBILE TOGGLE -->
            <button class="navbar-toggler m-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <!-- Profile -->
                    <li class="nav-item">
                        <a class="nav-link active py-0" aria-current="page" href="#"><i id="icons" class="fas fa-user-tie"></i><span class="nav-label"> My Profile</span></a>
                    </li>
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link active py-0" aria-current="page" href="admin-homepage.php"><i id="icons" class="fas fa-home"></i><span class="nav-label"> Home</span></a>
                    </li>
                    <!-- notifications -->
                    <li class="nav-item dropstart">
                        <a class="nav-link dropstart active py-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i id="icons" class="fas fa-bell"></i><span class="badge rounded-pill bg-info text-white align-text-top" id="notif-number">4</span><span class="nav-label"> Notifications</span> </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a data-bs-toggle="modal" data-bs-target="#manage-request" class="dropdown-item" href="#"><span class="text fw-bold">Adviser One</span> requested an account</a>
                            </li>
                            <li>
                                <a data-bs-toggle="modal" data-bs-target="#manage-request" class="dropdown-item" href="#"><span class="text fw-bold">Adviser Two</span> requested an account</a>
                            </li>
                            <li>
                                <a data-bs-toggle="modal" data-bs-target="#manage-request" class="dropdown-item" href="#"><span class="text fw-bold">Adviser Three</span> requested an account</a>
                            </li>
                        </ul>
                    </li>
                    <!-- logout -->
                    <li class="nav-item">
							<a id="icons" class="nav-link active py-0"  data-bs-toggle="modal" data-bs-target="#logoutmodal" aria-disabled="true"><i class="fas fa-sign-out-alt"></i><span class="nav-label"> Logout</span></a>
					</li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->


    <!-- MY PROFILE -->
	<!-- HEAD -->
    <div class="container" id="MY-ACCOUNT">
        <p class="text mt-5 text-danger text-center fw-bold fs-1">Admin Profile</p>
	</div>
    <div class="container container-fluid  p-3 mb-3 mt-3" id="myprofile">
        <div class="row">
            <!-- LEFT SIDE -->
            <div class="col-sm-4 ">
                <center>
                    <img class="img w-50  mb-3 rounded-circle" src="../../images/avatar.svg" alt="Profile Picture" id="profilepicture">
                    <br>
                    <label class="mb-3" for="upload">Change Profile:</label>
                    <br>
                    <div class="input-group input-group-sm w-75 mb-1">
                        <input type="file" class="form-control" id="upload" aria-describedby="upload" aria-label="Upload">
                        <button class="btn btn-danger" type="button" id="upload">Upload</button>
                    </div>
                    
                </center>
            </div>
            
            <!-- RIGHT SIDE -->
            <div class="col-sm-8">
                <div class="container">
                    <form class="row g-2">
                        <!-- first line -->
                        <div class="col-md-6">
                            <label for="first" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first" value="Juan" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last" value="Dela Cruz" required>
                        </div>
                        <!-- second line -->
                        <div class="col-md-12">
                            <label for="empID" class="form-label">Admin ID</label>
                            <input type="text" class="form-control" id="empID" value="admin001">
                        </div>
                        
                        <!-- third line -->
                        <div class="col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" value="Admin@wmsu.edu.ph" required>
                        </div>
                       
                        <!-- fourth line -->
                        <div class="col-md-12">
                            <label for="Contact" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="Contact" value="09123456789" required>
                        </div>
                       
                        <span class="input-group-sm mt-3">
                            <input type="submit" data-bs-toggle="modal" data-bs-target="#popup-save" value="Update" class="btn btn-danger">
                            <a href="#" class="btn btn-sm bg-secondary text-white m-3">Change Password</a>
                        </span>
                    </form>
                </div>
            </div>
        </div>
	</div>
	<!-- MY PROFILE END -->
    
     <!-- SUCCESS -->
     <div class="modal fade" id="popup-save" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteAccountLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAccountLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Save Changes?
            </div>
            <div class="modal-footer">
                <a href="#" type="button" class="btn btn-success" data-bs-dismiss="modal">Yes</a>
                <a href="#" type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</a>
            </div>
            </div>
        </div>
    </div>
    <!-- SUCCESS END -->

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

    <!-- Option 2: Separate Popper and Bootstrap JS -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
</body>
</html>