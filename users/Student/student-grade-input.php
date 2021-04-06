<?php
	include("../../includes/logout.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.css" />
    

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

    <!-- CONTENT -->
    <div class="container container-fluid overflow-auto" id="desktop-view">
        <h2 class="text fw-bold text-center mt-4">Submit your grades</h2>
        <p class="text-center">Two ways to submit your grades.</p>

        <!-- Choices -->
        <div class="container container-fluid p-3">
            <div class="row">
                <!-- QR Code -->
                <div class="col-sm-4">
                    
                    <div class="choice container container-fluid p-3 rounded " >
                        <h4 class="text-center">via QR Code</h4>
                        <center>
                            <img id="grade-icon" src="../../images/qr-sample.png" alt="grades" class="mb-4 w-50 border border-4 p-2 rounded">
                        </center>
    
                        <div class="input-group input-group-sm mb-1">
                            <input type="file" class="form-control" accept="image/x-png,image/gif,image/jpeg" id="file" name="file"  aria-label="Upload Grade">
                        </div>

                        <div class="text-center mt-3">
                            
                            <!-- POPUP VIEW INFO -->
                            <button type="button" class="btn btn-sm btn-dark w-100" data-bs-toggle="modal" data-bs-target="#view">
                                View information
                            </button>
                            <!-- POPUP HELP -->
                            <button type="button" class="btn btn-sm btn-secondary w-100 mt-1" data-bs-toggle="modal" data-bs-target="#help">
                                Help
                            </button>
                        </div>
                       
                    </div>
                </div>

                <!-- OR -->
                <div class="col-sm-1">
                    <table class="w-100" style="height: 100%;">
                        <tbody>
                            <td class="align-middle">
                                <h3 class="text-center">OR</h3>
                            </td>
                        </tbody>
                    </table>
                    
                </div>
    
                <!-- MANUAL INPUT -->
                <div class="col-sm-7">
                    <div class="container choice"  style="height: 100%;">
                        <h4 class="text-center">via Manual Input</h4>
                        <table class="table table-responsive table-sm table-striped table-bordered table-hover table-fixed">
                            <thead class="text-white bg-secondary">
                                <th>Subject</th>
                                <th>Grades</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Subject 1</td>
                                    <td>
                                        <input type="text" placeholder="Enter here..." class="w-100 border-0 bg-light" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Subject 2</td>
                                    <td>
                                        <input type="text" placeholder="Enter here..." class="w-100 border-0 bg-light" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Subject 3</td>
                                    <td>
                                        <input type="text" placeholder="Enter here..." class="w-100 border-0 bg-light" />
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container of Choices END-->

        <!-- BUTTONS -->
        <div class="text-center my-3">
            <a  onclick="history.back()" class="btn bg-secondary text-white m-1">Cancel</a>
            <a href="student-ii.php" class="btn btn-danger">Submit</a>
        </div>
        <!-- BUTTONS END -->

        <!-- HELP POPUP -->
        <div class="modal fade" id="help" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">How to use QR Code</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <img src="../../images/instruction.png" class="w-50" alt="instruction">
                        </center>
                        
                        <p>Take a screenshot of the QR Code from the pdf file of your grade and crop it.<br> <a href="http://wmsu.edu.ph/">Download your grades from the WMSU Portal</a><br><span class="fw-bold">NOTE: Remember to view the QR Code information before submitting to check</span></p>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- HELP POPUP END -->

        <!-- VIEW POPUP -->
        <div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">QR Code Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="content"></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- VIEW POPUP END -->

      
    </div>
    <!-- CONTENT END -->


    <!-- To Read QR Code -->
    <script type="text/javascript" src="../../bootstrap/qrReader.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>