<?php
	include("../../includes/logout.php");
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

		<title>Submit Grade</title>
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
                    <!-- logout -->
                    <li class="nav-item">
							<a type="button" id="icons" class="nav-link active py-0" data-bs-toggle="modal" data-bs-target="#logoutmodal" aria-disabled="true"><i class="fas fa-sign-out-alt"></i><span class="nav-label"> Logout</span></a>
					</li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

        
	<center>
        <div class="container bg-light p-2 pt-4 fs-5 mt-3" style="border-radius: 10px; border: transparent;">
            <p>Choose and select your desired subjects to be taken this semester. <span class="fw-bold">Units must be 1-26</span> </p>
        </div>
    </center>

	<div class="container container-fluid">
		<!-- TABLE -->
		<div class="container mb-2 mt-3 mb-5 overflow-auto">
			<table class="table table-responsive table-striped table-bordered pt-2 pb-3" style="width: 100%;" id="mydatatable">
				<thead class=" text-white">
					<tr>                       
                        <th >Code</th>
						<th>Title</th>
						<th scope="col">Units</th>
						<th scope="col">Days</th>
                        <th scope="col">Time</th>
                        <th >Action</th>
					</tr>
				</thead>
				<tbody>
					<tr onclick="window.location='#';" style=" cursor: pointer; "/>
						<th scope="row">CC 100</th>
						<td>Introduction to Computing</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
						<td>
                            <input
                                type="checkbox"
                                name="name1"
                                id="checking-0"
                                class="checkBox"
                            />&nbsp;
                        </td>

					</tr>
					<tr>
						<th scope="row">CC 101</th>
						<td>Computer Programming 1</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
						<td>
                            <input
                                type="checkbox"
                                name="name1"
                                id="checking-1"
                                class="checkBox"
                            />&nbsp;
                        </td>
					</tr>
					<tr>
						<th scope="row">CAS 101</th>
						<td>Purposive Communication</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
						<td>
                            <input
                                type="checkbox"
                                name="name1"
                                id="checking-2"
                                class="checkBox"
                            />&nbsp;
                        </td>
					</tr>
					<tr>
						<th scope="row">MATH 100</th>
						<td>Mathematics in the Modern World</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
						<td>
                            <input
                                type="checkbox"
                                name="name1"
                                id="checking-3"
                                class="checkBox"
                            />&nbsp;
                        </td>
					</tr>
					<tr>
						<th scope="row">US 101</th>
						<td>Understanding the Self</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
						<td>
                            <input
                                type="checkbox"
                                name="name1"
                                id="checking-4"
                                class="checkBox"
                            />&nbsp;
                        </td>
					</tr>
					<tr>
						<th scope="row">FIL 101</th>
						<td>Komunikasyon sa Akademikong Filipino</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
						<td>
                            <input
                                type="checkbox"
                                name="name1"
                                id="checking-5"
                                class="checkBox"
                            />&nbsp;
                        </td>
					</tr>
					<tr>
						<th scope="row">PE 101</th>
						<td>Physical Education 1</td>
						<td>2</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
						<td>
                            <input
                                type="checkbox"
                                name="name1"
                                id="checking-6"
                                class="checkBox"
                            />&nbsp;
                        </td>
					</tr>
					
				</tbody>
				
			</table>
		</div>
		<!-- TABLE END -->


        <!-- BUTTONS -->
        <center>
            <button type="button" class="btn btn-dark mb-3 mx-2" data-bs-toggle="modal" data-bs-target="#cancelbtn" >
                Cancel
            </button>
            <button type="button" name="checkAll" class="btn btn-secondary mb-3 mx-2 checkAll " onclick="checking()" id="checkboxAll">
                Check All
            </button>
            <button type="button" name="undo" class="btn btn-secondary mb-3 mx-2 undo" onclick="unchecking()" style="display: none" id="undo"
            >
                Uncheck All
            </button>
            <button class="btn btn-secondary mb-3 mx-2" data-bs-toggle="modal" data-bs-target="#error" data-bs-toggle="tooltip" data-bs-placement="top" title="For Demo Only" >Verify</button>
            <button type="button" class="btn btn-danger mb-3 mx-2" data-bs-toggle="modal" data-bs-target="#submitbtn">
                Submit
            </button>
            
        </center>      
        <!-- BUTTONS END -->

        <!-- POPUPS -->
            <!-- ERROR (for demo only) -->
            <div class="modal fade" id="error" tabindex="-1" >
                <div class="modal-dialog ">
                    <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="error">ERROR</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        There is something wrong with the units. Note that units must be a total of 1-26.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Try Again</button>
                    </div>
                    </div>
                </div>
            </div>

            <!-- CANCEL -->
            <div class="modal fade" id="cancelbtn" tabindex="-1" >
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cancelbtn">Cancel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to cancel this process?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="button"  class="btn btn-danger" onclick="history.back()">Yes</button>
                    </div>
                    </div>
                </div>
            </div>

            <!-- SUBMIT -->
            <div class="modal fade" id="submitbtn" tabindex="-1" >
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-success" id="submitbtn">SUCCESS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Subjects has been successfully selected.
                    </div>
                    <div class="modal-footer">                     
                        <a href="student-iii.php" type="button" class="btn btn-dark">Okay</a>
                    </div>
                    </div>
                </div>
            </div>
         <!-- POPUPS END -->
	</div>
    


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
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.js"></script>

    <!-- SELECT/UNSELECT ALL -->
     <script>
        function checking() {
            document.getElementById("checking-0").checked = true;
            document.getElementById("checking-1").checked = true;
            document.getElementById("checking-2").checked = true;
            document.getElementById("checking-3").checked = true;
            document.getElementById("checking-4").checked = true;
            document.getElementById("checking-5").checked = true;
            document.getElementById("checking-6").checked = true;

            document.getElementById("checkboxAll").style.display = "none";
            document.getElementById("undo").style.display = "inline";
        }
        function unchecking() {
            document.getElementById("checking-0").checked = false;
            document.getElementById("checking-1").checked = false;
            document.getElementById("checking-2").checked = false;
            document.getElementById("checking-3").checked = false;
            document.getElementById("checking-4").checked = false;
            document.getElementById("checking-5").checked = false;
            document.getElementById("checking-6").checked = false;

            document.getElementById("checkboxAll").style.display = "inline";
            document.getElementById("undo").style.display = "none";
        }
    </script>

    <!-- TABLE -->
	<script>
		$('#mydatatable').DataTable({
			initComplete: function () {
				this.api().columns().every( function(){
					var column = this;
					var select = $('<select><option value=""></option></select>')
					.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.DataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search( val ? '^'+val+'$' : '', true, false)
							.draw();
					});
					column.data().unique().sort().each( function (d,j) {
						select.append( '<option value="'+d+'">'+d+'</option>')
					});
				});
			}
		});
    </script>
    
    <!-- SCRIPTS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </body>
</html>
