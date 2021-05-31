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

    <!-- Colleges -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <a type="button"href="superadmin-admins.php">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Colleges</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">

                  <!-- <h4>Total Admin: *</h4> -->

                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-building fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
             </a>
          </div>
      </div>

    <!-- Courses -->
      <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <a type="button" href="superadmin-courses.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Courses</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
    
                      <!-- <h4>Total Admin: *</h4> -->
    
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
             </a>
          </div>
      </div>

    <!-- Admin Accounts -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
              <a type="button" href="superadmin-admins.php">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Admin Accounts</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
    
                      <!-- <h4>Total Admin: *</h4> -->
    
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
             </a>
          </div>
      </div>
  <!-- Content Row -->

   <!-- Bg image-->
   <a href="admin-subjects.php" class="col-xl-12 col-md-6 mb-4" >
        <div class="card-body text-center">
          <div class="row no-gutters justify-content-center">
            <div class="col-6">
              <img id="picture" src="../images/superadmin.svg" alt="Profile" />
            </div>
          </div>
        </div>
    </a>
  <?php
include('content/scripts.php');
include('content/footer.php');
?>