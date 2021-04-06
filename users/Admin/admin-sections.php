<?php
	include("../../includes/logout.php");
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
    
    <title>Sections</title>
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
                        <a class="nav-link active py-0" aria-current="page" href="admin-myprofile.php"><i id="icons" class="fas fa-user-tie"></i><span class="nav-label"> My Profile</span></a>
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


    <div class="container">
        <p class="text  mt-3 text-danger fw-bold text-center fs-2">Sections</p>
	</div>

    <!-- TABLE -->
    <div class="container p-2 container-fluid mb-3" >
        <div class="container overflow-auto" >
            <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                <thead class="text-white">
                    <tr>
                        <th>Section ID</th>
                        <th>Section</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Students</th>
                        <th>Available</th>
                    </tr>
                </thead>
                <tbody>
                    <tr onclick="window.location='#';" data-bs-toggle="modal" data-bs-target="#popup-manage-curriculum" style=" cursor: pointer; "/>
                        <th scope="row">BSCS1A</th>
                        <td>A</td>
                        <td>BSCS</td>
                        <td>1</td>
                        <td>60</td>
                        <td>FULL</td>
                    </tr>
                    <tr onclick="window.location='#';" data-bs-toggle="modal" data-bs-target="#popup-manage-curriculum" style=" cursor: pointer; "/>
                        <th scope="row">BSCS1B</th>
                        <td>B</td>
                        <td>BSCS</td>
                        <td>1</td>
                        <td>52</td>
                        <td>8</td>
                    </tr>
                    <tr onclick="window.location='#';" data-bs-toggle="modal" data-bs-target="#popup-manage-curriculum" style=" cursor: pointer; "/>
                        <th scope="row">BSIT1A</th>
                        <td>A</td>
                        <td>BSIT</td>
                        <td>1</td>
                        <td>54</td>
                        <td>6</td>
                    </tr>
                </tbody>
                <tfoot >	
                    <!-- table footer -->
                </tfoot>
            </table>
        </div>


        <!-- ADD SECTION Toggle-->
        <center>
            <button type="button" class="btn rounded-pill btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addSection" id="add-section">
                Add Section
            </button>
        </center>
        
    </div>
    <!-- TABLE END -->

  
    
    <!-- ADD NEW Section POPUP -->
    <div class="container container-fluid">
        <div class="modal fade" id="addSection" tabindex="-1" aria-labelledby="addSectionLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="addSectionLabel">Add New Section</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Inputs -->
                        <form>
                            <div class="mb-3">
                                <label for="input-sectionID" class="form-label">Section ID</label>
                                <input type="text" class="form-control" id="input-sectionID" aria-describedby="input-sectionID-help" required>
                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                            </div>

                            <div class="container p-0 mb-3" id="select-section">
                                <label for="select-section" class="form-label" >Section</label>
                                <select class="custom-select p-2 " id="select-section" required>
                                    <option selected>Select Section...</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>			
                            </div>

                            <div class="container p-0 mb-3" id="select-course">
                                <label for="select-course" class="form-label" >Course</label>
                                <select class="custom-select p-2 " id="select-course" required>
                                    <option selected>Select Course...</option>
                                    <option value="1">BSCS</option>
                                    <option value="1">BSIT</option>
                                </select>			
                            </div>	

                            <div class="container p-0 mb-3" id="select-year">
                                <label for="select-year" class="form-label" >Year</label>
                                <select class="custom-select p-2 " id="select-year" required>
                                    <option selected>Select Year...</option>
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                </select>			
                            </div>	

                            <div class="mb-3">
                                <label for="input-available" class="form-label">Available Slots</label>
                                <input type="number" class="form-control" id="input-available" aria-describedby="input-available-help" required>
                                <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                            </div>

                            <div align="right">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD SECTION END -->

    <!-- SECTION MANAGE -->
    <div class="modal fade" id="popup-manage-curriculum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manage-curriculum" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="manage-curriculum">Manage Curriculum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="input-sectionID" class="form-label">Section ID</label>
                        <input type="text" class="form-control" id="input-sectionID" aria-describedby="input-sectionID-help" required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>

                    <div class="container p-0 mb-3" id="select-section">
                        <label for="select-section" class="form-label" >Section</label>
                        <select class="custom-select p-2 " id="select-section" required>
                            <option selected>Select Section...</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>			
                    </div>

                    <div class="container p-0 mb-3" id="select-course">
                        <label for="select-course" class="form-label" >Course</label>
                        <select class="custom-select p-2 " id="select-course" required>
                            <option selected>Select Course...</option>
                            <option value="1">BSCS</option>
                            <option value="1">BSIT</option>
                        </select>			
                    </div>	

                    <div class="container p-0 mb-3" id="select-year">
                        <label for="select-year" class="form-label" >Year</label>
                        <select class="custom-select p-2 " id="select-year" required>
                            <option selected>Select Year...</option>
                            <option value="1">1</option>
                            <option value="1">2</option>
                            <option value="1">3</option>
                            <option value="1">4</option>
                        </select>			
                    </div>	

                    <div class="mb-3">
                        <label for="input-available" class="form-label">Available Slots</label>
                        <input type="number" class="form-control" id="input-available" aria-describedby="input-available-help" required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>

                    <div align="right">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MANAGE SECTION END -->

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
		$('#table').DataTable();
	</script>

</body>
</html>