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

	<title>Schedule</title>
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
					</tr>
				</thead>
				<tbody>
					<tr onclick="window.location='#';" style=" cursor: pointer; "/>
						<th scope="row">CC 100</th>
						<td>Introduction to Computing</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
					</tr>
					<tr>
						<th scope="row">CC 101</th>
						<td>Computer Programming 1</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
					</tr>
					<tr>
						<th scope="row">CAS 101</th>
						<td>Purposive Communication</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
					</tr>
					<tr>
						<th scope="row">MATH 100</th>
						<td>Mathematics in the Modern World</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
					</tr>
					<tr>
						<th scope="row">US 101</th>
						<td>Understanding the Self</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
					</tr>
					<tr>
						<th scope="row">FIL 101</th>
						<td>Komunikasyon sa Akademikong Filipino</td>
						<td>3</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
					</tr>
					<tr>
						<th scope="row">PE 101</th>
						<td>Physical Education 1</td>
						<td>2</td>
						<td>MWF</td>
						<td>11:00-12:30</td>
					</tr>
					
				</tbody>
				
			</table>
		</div>
		<!-- TABLE END -->


	<center id="button" class="mb-3 mt-3 fixed-bottom">
		<button href="#" class="btn btn-secondary" onclick="history.back()">Back</button>
		<button href="#" class="btn btn-danger" >Download</button>
	</center>

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