
   <!-- Sidebar -->
   <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

 <!-- COLLEGE LOGO/SEAL -->
 <a class="sidebar-brand d-flex align-items-center justify-content-center mb-5 mt-5" href="#" id="nav-logo">    
      <?php 
        while($getcollege = mysqli_fetch_array($query1))
        { 
          $college_check = $_SESSION['college_id_fk'];
          $getdata = mysqli_query($connection,"SELECT * FROM tblcollege WHERE id='$college_check'");

          while($fa = mysqli_fetch_array($getdata))
          {
            $boom = $fa['seal'];
            echo "<span id='department'>  "."<img class='rounded-circle' style='width: 80px; height: 80px; margin-right: 10px;' src='../upload/$boom'>".$fa['collegecode']."</span>";
          }
        }							
      ?> 
    </a>	
<!-- </a> -->



<!-- Divider -->
<hr class="sidebar-divider my-0 mb-1">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="admin-dashboard.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider mb-2">

<!-- Heading -->
<div class="sidebar-heading mb-3">
  Pages
</div>

<!-- Nav Item - Pages Collapse Menu -->

    <!-- Curriculum -->
    <li class="nav-item">
      <a class="nav-link" href="admin-curriculum.php">
        <i class="fas fa-th-list"></i>
        <span>Curriculum</span></a>
    </li>

     <!-- Adviser List -->
     <li class="nav-item">
      <a class="nav-link" href="admin-advisers.php">
        <i class="fas fa-user-friends"></i>
        <span>Adviser List</span></a>
    </li>

    
    

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<!-- <div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div> -->

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

  
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-danger" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">
                  <?php	
                      $notif_num = mysqli_query($connection,"SELECT * FROM tblrequest_account WHERE req_usertype='Adviser'");
                      $notif_count = mysqli_num_rows($notif_num);	
                      echo $notif_count;		
                  ?>
                  </span>
              </a>
              <!-- Dropdown - Alerts -->
             
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">
                    Notifications
                  </h6>
                  <a class="dropdown-item d-flex align-items-center" href="admin-notification.php">
                    <div class="mr-3">
                      <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                      </div>
                    </div>
                    <div>
                      <!-- <div class="small text-gray-500">December 12, 2019</div> -->
                      <span class="font-weight-bold">
                      <?php
                        if( $notif_count > 0){
                          echo "New Account Request received! Check it out";
                        }
                        else{
                          echo "No Notification at the moment";
                        }
                      ?>
                      </span>
                    </div>
                  </a>
                  <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                </div>
             </li>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600">                
                 ADMIN              
                </span>
                <img src="../images/avatar.svg" class="img-profile rounded-circle"  alt="Profile Picture" id="profilepicture">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="admin-myprofile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title bg-danger" id="exampleModalLabel"></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Are you sure you want to logout?</div>
        <div class="modal-footer">
          <button class="btn btn-danger" type="button" data-dismiss="modal">No</button>

          <form action="../includes/logout.php" method="POST"> 
          
            <button type="submit" name="logout" class="btn btn-success">Yes</button>

          </form>

        </div>
      </div>
    </div>
  </div>