<?php
    session_start();
	include("../../includes/logout.php");
    include("../../includes/config.php");
    include("../../includes/sectionalertmessage.php");

    $user_check = $_SESSION['login_user'];
	$query1 = mysqli_query($connection, "SELECT * FROM tbluser WHERE email = '$user_check'");
    while($fa = mysqli_fetch_array($query1))
    {
        $detected = $fa['college_id_fk'];
    }

    $query2 = mysqli_query($connection, "SELECT * FROM tblcourse WHERE college_id_fk ='$detected'");
    while($fa = mysqli_fetch_array($query2))
    {
        $detectedcourseid = $fa['id'];
    }

   // Use select query 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- DATATABLE -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.css"/>
    <!-- local css -->
    <link rel="stylesheet" href="../../css/style-admin.css" />
    
    <title>Notifications</title>
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
                        <a class="nav-link active py-0" aria-current="page" href="student-iii.php"><i id="icons" class="fas fa-home"></i><span class="nav-label"> Home</span></a>
                    </li>
                    <!-- notifications -->
                    <li class="nav-item dropstart">
                        <a class="nav-link dropstart active py-0" href="admin-notifications.php" id="navbarDropdown" aria-expanded="false"> <i id="icons" class="fas fa-bell "></i><span class="badge rounded-pill bg-info text-white align-text-top" id="notif-number">
                            <?php	
                                $notif_num = mysqli_query($connection,"SELECT * FROM tblrequest_Account WHERE req_usertype='Adviser'");
                                $notif_count = mysqli_num_rows($notif_num);	
                                echo $notif_count;		
                            ?>
                        </span><span class="nav-label "> Notifications</span> </a>
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


    <div class="container">
        <p class="text  mt-3 text-danger fw-bold text-center fs-2">Notification</p>
	</div>

    <!-- TABLE -->
    <div class="container p-2 container-fluid mb-3" >
        <div class="container overflow-auto" >
            <table class="table table-hover table-responsive table-bordered " id="table">
                <thead class="text-white">
                    <tr class="id">
                        <th >Request ID</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>   
                        <th>Password</th>  
                        <th>Date/Time Requested</th>    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($notif_count == 0){
                            echo "<td class='bg-light text-center'>No notification at the moment</td>";
                        }
                        else{
                            $disreq = mysqli_query($connection, "SELECT * FROM tblrequest_account WHERE req_usertype='Adviser'");
                            while($dis = mysqli_fetch_array($disreq))
                            {         
                                echo '<tr data-bs-toggle="modal" class="req_btn ">';
                                echo "<td class='id'>".$dis['id']."</td>";
                                echo "<td class='id'>".$dis['firstname']."</td>";
                                echo "<td class='id'>".$dis['lastname']."</td>";
                                echo "<td class='id'>".$dis['email']."</td>";
                                echo "<td class='id'>".$dis['password']."</td>";  

                                $courseid=$dis['course_id_fk'];
                                $course_query = mysqli_query($connection,"SELECT * FROM tblcourse WHERE id= $courseid");
                                if(mysqli_num_rows($course_query) > 0){
                                    $fa_c = mysqli_fetch_array($course_query);
                                    $coursecode = $fa_c['coursecode'];
                                }
                                echo "<td class='id'>".$coursecode."</td>";
                                echo "<td class='id'>".$dis['yearlevel']."</td>";  
                                echo "<td class='id'>".$dis['college_id_fk']."</td>";  

                                echo "<td class='bg-light text-center '><span class='fw-bold'>".$dis['firstname']." ".$dis['lastname']." </span><i><span> requested an Account</span></i><span class='p-5 align-top'>".$dis['date_requested']."</span></td>"; 
                                echo "</tr>";      

                            }
                        }
                    ?>                       
                </tbody>
               
                
                <tfoot >	
                    <!-- table footer -->
                </tfoot>
            </table>
        </div>
    </div>
    <!-- TABLE END -->

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
                        <form action="manageadvisersdata.php" method="POST" >
                            <!-- id -->
                            <input type="hidden" id="id" name="id">
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="input-name" class="form-label">Firstname</label>
                                <input type="text" name="firstname"class="form-control" id="fname" aria-describedby="input-name-help" 
                                readonly>
                            </div>
                            <div class="mb-3">
                                <label for="input-name" class="form-label">Lastname</label>
                                <input type="text" name="lastname" class="form-control" id="lname" aria-describedby="input-name-help" 
                                readonly>
                            </div>
                             <!-- Email -->
                            <div class="mb-3">
                                <label for="input-email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email" 
                                readonly>
                            </div>

                            <!-- Password-->
                            <div class="mb-3">
                                <input type="hidden" name="password" class="form-control" id="Password">
                            </div>

                             <!-- College-->
                             <div class="mb-3">
                                <input type="hidden" name="collegeid" class="form-control" id="collegeid">
                            </div>

                            <!-- COURSE & YEAR LEVEL -->
                            <div class="row mb-3">
                                <label for="password" class="form-label">Assigned in</label>
                                <div class="col-sm-3">
                                        <input type="text" class="form-control" id="courseid" name="coursecode" readonly/>
                                </div>
                                <div class="col-sm-3">
                                        <input type="text" class="form-control" id="yearlevel" name="yearlevel" readonly/>
                                </div>
                             
                            </div>

                            <!-- Usertype -->	
                            <div class="mb-3">
								<input type="hidden" class="form-control" id="usertype" name="usertype" value="Adviser">
							</div>	
          

                            <div align="right">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Disapprove</button>
                                <button type="submit" name="approve_adviser_request" type class="btn btn-success">Approve</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- REQUEST END -->


    <!-- DELETE MODAL-->
	<div class="container container-fluid">
        <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="managesectionsdata.php" method="POST">
                        <center>
                            <input type="hidden" name="id" id="deleteid">

                            <div class="modal-body">
                                All data will be deleted! 
                                Are you sure you want to delete this Section?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" name="delete_section" class="btn btn-danger">Yes</button>
                            </div>                     
                        </center>
                    </form>
                </div>
            </div>
        </div>
	<!--END OF DELETE MODAL-->

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
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.js"></script>

    <script>
        $(document).ready(function()
        {
            $('.req_btn').on('click',function()
            {
                $('#manage-request').modal('show');

                    $tr= $(this).closest('tr');

                    var data = $tr.children('td').map(function(){
                        return $(this).text(); 
                    }).get();

                    console.log(data);

                    $('#id').val(data[0]);
                    $('#fname').val(data[1]);
                    $('#lname').val(data[2]);
                    $('#email').val(data[3]);
                    $('#Password').val(data[4]);
                    $('#courseid').val(data[5]);
                    $('#yearlevel').val(data[6]);
                    $('#collegeid').val(data[7]);
            });
        });
    </script>
<!-- 
    <script>
		$('#table').DataTable();
	</script> -->

</body>
</html>