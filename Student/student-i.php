<?php
	session_start();
    include("../includes/config.php");
     
	$user_check = $_SESSION['login_user'];
	$query1 = mysqli_query($connection, "SELECT * FROM tbluser WHERE email = '$user_check'");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- BOOTSTRAP -->
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.css" />
		<!-- OFFLINE BOOTSTRAP -->
		<link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />

		<!-- fontawesome -->
		<link
			rel="stylesheet"
			href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
			integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="../bootstrap/fontawesome.min.css" />
		<!-- local css -->
		<link rel="stylesheet" href="../css/style-student.css" />

		<title>Submit Grade</title>
	</head>
	<body>
		<!-- NAVBAR -->
		<nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
			<div class="container-fluid">
				<!-- COLLEGE LOGO/SEAL -->
				<a class="navbar-brand p-0 m-0" href="#" id="nav-logo">
					<?php 
						while($getcollege = mysqli_fetch_array($query1))
						{ 
							$college_check = $getcollege['college_id_fk'];
							$getdata = mysqli_query($connection,"SELECT * FROM tblcollege WHERE id='$college_check'");

							while($fa = mysqli_fetch_array($getdata))
							{
								$boom = $fa['seal'];
								echo "<span id='department'>  "."<img style='width: 2rem; height: 2rem; margin-right: 10px;' src='../upload/$boom'>".$fa['college']."</span>";
							}
						}							
					?> 
				</a>

				<!-- MOBILE TOGGLE -->
				<button
					class="navbar-toggler m-0"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span><i class="fas fa-bars"></i></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<!-- Curriculum -->
						<!-- <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Curriculum">
							<a class="nav-link active py-0" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#curriculum"
								><i class="fas fa-scroll"></i><span class="nav-label"> Curriculum</span></a
							>
						</li> -->

						<!-- logout -->
						<li class="nav-item">
							<a type="button" id="icons" class="nav-link active py-0" data-bs-toggle="modal" data-bs-target="#logoutModal" aria-disabled="true"><i class="fas fa-sign-out-alt"></i><span class="nav-label"> Logout</span></a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		 <!-- Logout Modal-->
		 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title bg-danger" id="exampleModalLabel"></h5>
				<button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				</div>
				<div class="modal-body">Are you sure you want to logout?</div>
				<div class="modal-footer">
				<button class="btn btn-danger" type="button" data-bs-dismiss="modal">No</button>

				<form action="../includes/logout.php" method="POST"> 
				
					<button type="submit" name="logout" class="btn btn-success">Yes</button>

				</form>

				</div>
			</div>
			</div>
		</div>
		<!-- END OF NAVBAR -->

		<!-- CURRICULUM POPUP -->
		<!-- <div class="modal fade" id="curriculum" tabindex="-1" aria-labelledby="curriculumLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="curriculumLabel">View Curriculum</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<a href="../../curriculum/CS-Prospectus.pdf" target="_blank" class="btn btn-danger w-100 my-2">BSCS</a>
						<a href="../../curriculum/IT-Prospectus.pdf" target="_blank" class="btn btn-danger w-100 my-2">BSIT</a>
					</div>
				</div>
			</div>
		</div> -->
		<!-- CURRICULUM POPUP END -->

        <!-- Profile -->
		<div class="container">
            <center>
                <img id="avatar-student" src="../images/avatar-student.svg" class="text mt-3" alt="avatar" />
			    <p class="text mt-3 text-danger fw-bold text-center fs-2">Hello, <span class="text-dark">
					<?php
						 $firstname = $_SESSION['firstname']; 
						 $lastname = $_SESSION['lastname']; 
						 echo $firstname." ". $lastname;
					?>
				</span></p>
            </center>
		</div>
        <!-- profile -->

        <!-- PROGRESS BAR -->
		<div class="container container-fluid" id="container-progress">
            <!-- CIRCLE -->
            <span class="dot start text float-start" id="active"></span> <!-- CIRCLE 1 -->
            <span class="dot center" ></span>           <!-- CIRCLE 2 -->
            <span class="dot end text float-end" ></span>         <!-- CIRCLE 3 -->

			<div class="progress mx-auto" id="progressbar" style="height: 5px">
				<div class="progress-bar progress-bar-striped " role="progressbar" id="progress-no-anim" style="width: 0%"></div>
            </div>
            
           <!-- DESCRIPTION -->
		   <span class="title first text float-start" id="active-title">Start</span> 
            <span class="title second " id="active-title">Submit Grades</span>         
            <span class="title third text float-end" >Finish</span>       
       

		</div>
        <!-- PROGRESS BAR -->
		<br> <br>

		<!-- FEEDBACK -->
        <center>
            <div class="contaier container-fluid" >
                <p class="text bg-light w-75 p-5" id="feedback">Submit your grades to generate your subjects. Click the <span><a href="#">Grades</a> </span>  button below.</p>
            </div>
        </center>
        <!-- FEEDBACK END -->
 

        <!-- BUTTONS -->
        <div class="container fixed-bottom text-center mb-4">
			<a class="btn btn-danger text-white ms-1" href="student-grade-input.php">Grades</a>
            <a class="btn btn-danger text-white me-1 disabled" href="studentSubject.php">Subjects</a>
            
        </div>
		<!-- BUTTONS END -->
		

		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<script
			src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
			integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
			crossorigin="anonymous"
		></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
			integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
			crossorigin="anonymous"
		></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	</body>
</html>
