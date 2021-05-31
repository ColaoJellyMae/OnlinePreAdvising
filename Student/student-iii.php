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
		<link rel="stylesheet" href="../../bootstrap/fontawesome.min.css" />
		<!-- local css -->
		<link rel="stylesheet" href="../../css/style-student.css" />

		<title>Approval</title>
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
								echo "<span id='department'>  "."<img style='width: 2rem; height: 2rem; margin-right: 10px;' src='../SuperAdmin/images/$boom'>".$fa['college']."</span>";
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
						<!-- Curriculum
						<li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Curriculum">
							<a class="nav-link active py-0" aria-current="page" href="#" data-bs-toggle="modal" data-bs-target="#curriculum"
								><i class ="fas fa-scroll"></i><span class="nav-label"> Curriculum</span></a
							>
						</li> -->
						<!-- notifications -->
						<li class="nav-item dropstart">
							<a class="nav-link dropstart active py-0" href="student-notification.php" id="navbarDropdown" aria-expanded="false"> <i id="icons" class="fa fa-bell"></i><span class="badge rounded-pill bg-info text-white align-text-top" id="notif-number"></span><span class="nav-label "> Notifications</span> </a>
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

		<!-- CURRICULUM POPUP -->
		<div class="modal fade" id="curriculum" tabindex="-1" aria-labelledby="curriculumLabel" aria-hidden="true">
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
		</div>
		<!-- CURRICULUM POPUP END -->

        <!-- Profile -->
		<div class="container">
            <center>
                <img id="avatar-student" src="../../images/avatar-student.svg" class="text mt-3" alt="avatar" />
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
            <span class="dot center" id="active"></span>           <!-- CIRCLE 2 -->
            <span class="dot end text float-end"  id="active"></span>         <!-- CIRCLE 3 -->

			<div class="progress mx-auto" id="progressbar" style="height: 5px">
				<div class="progress-bar  " role="progressbar" id="progress2" style="width: 100%"></div>
            </div>
            
            
            <!-- DESCRIPTION -->
            <span class="title first text float-start" id="active-title">Submit Grades</span> 
            <span class="title second " id="active-title">Select Subjects</span>         
            <span class="title third text float-end" id="active-title">Approval</span>       

			<div class="spinner-grow  float-end" id="spinner" role="status">
				<span  class="visually-hidden"></span>
			</div>
		</div>
        <!-- PROGRESS BAR -->
		<br> <br>

		<!-- FEEDBACK -->
        <center>      
			<?php
				// if(isset( $_SESSION['student_process_message']) &&  $_SESSION['student_process_message'] = "success"){
				// 	echo '<div class="contaier container-fluid mb-2" >
				// 			<p class="text bg-light w-75 p-5" id="feedback">Subjects have been submitted, waiting for approval from your adviser <br><span>
								
				// 			<!-- <a class="text-danger fw-bold" href="student-disapprove.html">DEMO: DISAPPROVED</a> </span><br><span><a class="text-success fw-bold" href="student-approve.html">DEMO: APPROVED</a> </span> </p> -->
				// 		</div>';
				// }
			?>
        </center>
        <!-- FEEDBACK END -->
 

        <!-- BUTTONS -->
        <div class="container  text-center mb-4">
			<a class="btn btn-danger text-white ms-1" data-bs-toggle="modal" data-bs-target="#notice_modal_grades">Grades</a>
            <a class="btn btn-danger text-white me-1 " data-bs-toggle="modal" data-bs-target="#notice_modal_subjects">Subjects</a>
            
        </div>
		<!-- BUTTONS END -->

		 <!-- Notice Message when button clicked -->

		 <!-- For button subject -->
		 <div class="container container-fluid bg-white">
			<div class="modal fade" id="notice_modal_subjects" tabindex="-1" aria-labelledby="addSubjectLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-header bg-danger text-white">
						<h5 class="modal-title fw-bold" id="addSubjectLabel">Notice!</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>       
					<div class="modal-body bg-light">
						You already submitted your Subjects, Please wait for the approval of your adviser.
					</div>
					<div class="modal-footer bg-light">                     
						<a href="student-iii.html" type="button" class="btn btn-dark">Okay</a>
					</div>
				</div>
			</div>
		</div>

		<!-- For button grades -->
		<div class="container container-fluid bg-white">
			<div class="modal fade" id="notice_modal_grades" tabindex="-1" aria-labelledby="addSubjectLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-header bg-danger text-white">
						<h5 class="modal-title fw-bold" id="addSubjectLabel">Notice!</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>       
					<div class="modal-body bg-light">
						You already submitted your Grades, Please wait for the approval of your adviser.
					</div>
					<div class="modal-footer bg-light">                     
						<a href="student-iii.html" type="button" class="btn btn-dark">Okay</a>
					</div>
				</div>
			</div>
		</div>
         <!--  Notice Message when button clicked end -->
		
		<!-- Display selected subjects -->
				<!-- TABLE -->
				<div class="container mb-2 mt-3 mb-5 overflow-auto">
                <table class="table table-responsive table-striped table-bordered pt-2 pb-3" style="width: 100%;" id="mydatatable">
                    <thead class="text-white text-center">
                        <tr>                       
                            <th >Subject Code</th>
                            <th>Title</th>
                            <th scope="col">Lec Hrs</th>
                            <th scope="col">Lab Hrs</th>
                            <th scope="col">Units</th>
                            <th scope="col">Prerequisite</th>
                            <th>Days</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Room</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                            $sql="SELECT * FROM `tblstudent_selected_subjects`";
                            $result = mysqli_query($connection,$sql);

                            while($dis= mysqli_fetch_array( $result))
                            {
                                echo "<tr>";
                                echo "<td class='hide'>".$dis['id']."</td>";
                                $schedid=$dis['schedule_id_fk'];

                                $check_schedule = mysqli_query($connection,"SELECT * FROM tblschedule WHERE id=$schedid");

                                if(mysqli_num_rows($check_schedule) > 0){

									$dis2 = mysqli_fetch_array($check_schedule);

									$subjectid=$dis2['subject_id_fk'];
									$check_subject = mysqli_query($connection,"SELECT * FROM tblsubject WHERE id=$subjectid");
									if(mysqli_num_rows($check_subject) > 0){
										$dis3 = mysqli_fetch_array($check_subject);
										echo "<td class='hide'>".$dis3['id']."</td>";
										echo "<td>".$dis3['subject_code']."</td>";
										echo "<td>".$dis3['title']."</td>";	

										$Lec = $dis3['lec'];
										$Lab = $dis3['lab'];
										$Lec = number_format($Lec,1);
										$Lab = number_format($Lab,1);
										
										echo "<td>".$Lec."</td>";
										echo "<td>".$Lab."</td>";
										echo "<td>".$dis3['units']."</td>";

										$subject_code =$dis3['subject_code'];
										$title =$dis3['title'];
										$Prereq = $dis3['prerequisite'];
										$query_prereq = mysqli_query($connection , "SELECT * FROM tblsubject WHERE id='$Prereq'");
	
										if(mysqli_num_rows($query_prereq) > 0){
											$getprereq = mysqli_fetch_array ($query_prereq);
											$prerequisite = $getprereq['subject_code'];   
										}
										else{
											$prerequisite = "NONE";
										}
								
										echo "<td>".$prerequisite."</td>";
									}
									
                                    echo "<td class='hide'>".$dis2['id']."</td>";
                                    echo "<td class='hide'>".$dis2['subject_id_fk']."</td>";                  
									echo "<td>".$dis2['days']."</td>";
									echo "<td>".$dis2['time-start']."</td>";
									echo "<td>".$dis2['time-end']."</td>";
									echo "<td>".$dis2['room']."</td>";
									echo '<td class="text-center"><span class="badge bg-danger">?</span></td>';

								}               
                            }

                        ?>
                    </button>
                        
                    </tbody>
                    
                </table>
				<div class="row mb-5">
					<div class="col-sm-5">Advised by:
						<span class="fw-bold ">
							adviser name
						</span>
					</div>
					<div class="col-sm-6 text-end">Total Units<span class="text-bg-light">(50 maximum)</span>:
						<span class="fw-bold">
							total units
						</span>
					</div>
				</div> 
            </div> 

		<!-- Display selected subjects end-->

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
