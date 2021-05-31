<?php
include('content/header.php'); 
include('content/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-5">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    
  </div>

  <!-- Content Row -->
  <div class="row justify-content-center">

    <!-- Curriculum -->
    <a href="adviser-grades-approval.php" class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Student Grades Approval</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">

                <!-- <h4>Total Admin: *</h4> -->

                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-th-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
    </a>

     <!-- Student List-->
     <a href="adviser-student-list.php" class="col-xl-4 col-md-6 mb-4" >
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Student List</div>
              <!-- <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div> -->
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </a>
</div>
 <!-- Content Row -->
 <div class="row justify-content-center">

  <!-- Bg image-->
  <a href="admin-subjects.php" class="col-xl-12 col-md-6 mb-4" >
        <div class="card-body text-center">
          <div class="row no-gutters justify-content-center">
            <div class="col-6">
              <img id="picture" src="../images/adviser.svg" alt="rocket" />
            </div>
          </div>
        </div>
    </a>

  <!-- Content Row -->
  <?php
include('content/scripts.php');
include('content/footer.php');
?>