<?php
    session_start();
    include('content/header.php'); 
    include('content/navbar.php'); 
    include("../includes/config.php");
    $sql = mysqli_query($connection,"SELECT * FROM  tblcollege");
?>

<!--Add College-->
<div class="modal fade" id="addcollege" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add College</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="managedepartmentsdata.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">
            <div class="form-group">
                <label>College Name</label>
                <input type="text" name="collegename" class="form-control" placeholder="Enter College Name">
            </div>
            <div class="form-group">
                <label>College Code</label>
                <input type="text" name="collegecode" class="form-control" placeholder="Enter College Code">
            </div> 
            <div class="form-group">
                <label>College Seal</label>
                <input type="file" name="image" class="form-control">
            </div>   
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add-department-data" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Edit College-->
<div class="modal fade" id="editcollegemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit College</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="managedepartmentsdata.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" id="collegeid">
        <div class="modal-body">
            <div class="form-group">
                <label>College Name</label>
                <input type="text" name="collegename" id="collegename" class="form-control" placeholder="Enter College Name">
            </div>
            <div class="form-group">
                <label>College Code</label>
                <input type="text" name="collegecode" id="collegecode" class="form-control" placeholder="Enter College Code">
            </div> 
            <div class="form-group">
                <label>College Seal</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>   
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="edit_college" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="mb-3 fw-bold text-danger font-weight-bold  text-center ">Colleges<br>
    </h2>
    <button type="button" class="btn btn-danger rounded-pill " data-toggle="modal" data-target="#addcollege">
      Add College
    </button>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-danger  text-white">
          <tr>
            <th> College Code </th>
            <th>College Name</th>
            <th class="text-center">College Seal </th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
     
          <tr>
          <?php
             while($fa = mysqli_fetch_array($sql)){
              echo "<tr>";
              echo "<td class='hide'>".$fa['id']."</td>";
              echo "<td>".$fa['collegecode']."</td>";
              echo "<td>".$fa['college']."</td>";
              echo '<td class="text-center"><div class="img-con"><img class="rounded-circle p-0"  src="../upload/'.$fa['seal'].'" alt="COLLEGE SEAL" width="32" height="32" id="seal-img"></div></td>';

             echo '<td><center><button  type="submit" name="edit_btn" data-toggle="modal" data-target="#editcollegemodal"  class="btn btn-success rounded-pill fas fa-edit editbtn"> EDIT</button>';
             echo '<button type="button" name="delete_btn" data-toggle="modal" data-target="#deletecollegemodal" class="btn btn-danger rounded-pill fas fa-trash-alt deletebtn"> DELETE</button></center>
                </td>';
              echo "</tr>";
          }
          ?>
          <!--end php code-->
      </table>

    </div>
  </div>
</div>

    <!-- DELETE MODAL-->
    <div class="container container-fluid">
        <div class="modal fade" id="deletecollegemodal" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="managedepartmentsdata.php" method="POST">
                        <center>
                            <input type="hidden" name="id" id="deleteid">

                            <div class="modal-body">
                            Are you sure you want to delete this College Department?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" name="delete_college" class="btn btn-danger">Yes</button>
                            </div>                     
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!--END OF DELETE MODAL-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
    <script src="js/delete.js"></script>
    <script src="js/edit.js"></script>

<?php
 include('content/scripts.php');
 include('content/footer.php');
?>