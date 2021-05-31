<?php
    session_start();
    include('content/header.php'); 
    include('content/navbar.php'); 
    include("../includes/config.php");
    $sql = mysqli_query($connection,"SELECT * FROM  tblcollege");
?>

<!--Add Course-->
<div class="modal fade" id="addcoursemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="managecoursedata.php" method="POST"  >

        <div class="modal-body">
            <div class="form-group">
                <label>Course</label>
                <input type="text" name="coursename" class="form-control" placeholder="Enter Course Name">
            </div>
            <div class="form-group">
                <label>Course Code</label>
                <input type="text" name="coursecode" class="form-control" placeholder="Enter Course Code">
            </div> 
            <div class="form-group">
                <label>College</label>
                <select type="text" name="college" class="form-control" autocomplete="off" placeholder="Select College" list="colleges"/>
                    <option value="">Select...</option>
                    <?php
                        $query_run =mysqli_query($connection,"SELECT * from tblcollege");
                        while($fa= mysqli_fetch_array($query_run)){
                             echo "<option value=".$fa['college'].">".$fa['college']."</option>";
                        }
                    ?>
                </select>
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_course" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!--Edit Course-->
<div class="modal fade" id="editcoursemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="managecoursedata.php" method="POST">

        <div class="modal-body">
            <input type="hidden" name="id" id="courseid">
            <div class="form-group">
                <label>Course</label>
                <input type="text" name="coursename" id="coursename" class="form-control" placeholder="Enter Course Name">
            </div>
            <div class="form-group">
                <label>Course Code</label>
                <input type="text" name="coursecode" id="coursecode" class="form-control" placeholder="Enter Course Code">
            </div> 
            <div class="form-group">
                <label>College</label>
                <select type="text" name="college" class="form-control" autocomplete="off" placeholder="Select College" list="colleges"/>
                    <option value="">Select...</option>
                    <?php
                        $query_run =mysqli_query($connection,"SELECT * from tblcollege");
                        while($fa= mysqli_fetch_array($query_run)){
                             echo "<option value=".$fa['college'].">".$fa['college']."</option>";
                        }
                    ?>
                </select>
            </div> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="edit_course" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!--  Table Course -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="mb-3 fw-bold text-danger font-weight-bold  text-center ">Courses<br>
    </h2>
    <button type="button" class="btn btn-danger rounded-pill " data-toggle="modal" data-target="#addcoursemodal">
      Add Course
    </button>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-danger  text-white">
          <tr>
            <th>Course Code</th>
            <th>Course</th>
            <th>College</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody
          <?php    
            $getcourse = mysqli_query($connection,"SELECT * FROM  tblcourse");
             while($fa = mysqli_fetch_array($getcourse))
             {
                 echo "<tr>";
                 echo "<td class='hide'>".$fa['id']."</td>";
                 echo "<td>".$fa['coursecode']."</td>";
                 echo "<td>".$fa['course']."</td>";
         
                 $id = $fa['college_id_fk'];
                 $getcollege = mysqli_query($connection,"SELECT college FROM tblcollege where id='$id'");

                 if(mysqli_num_rows($getcollege) >0)
                 {
                    $fa_c = mysqli_fetch_array($getcollege);
                     echo "<td>".$fa_c['college']."</td>";
                 }
                 echo "<center><td class='text-center'> <button type='button' data-toggle='modal' data-target='#editcoursemodal' class='fas fa-edit btn rounded-pill btn-success editcoursebtn'>  Edit</button> ";

                 echo "<button type='button' data-toggle='modal' data-target='#deletecoursemodal' class='fas fa-trash-alt btn rounded-pill btn-danger deletecoursebtn'>  Delete</button></td></center>";

                 echo "</tr>" ;
             }
          ?>
         </table>
        </div>
    </div>
  </div>
</div>

    <!-- DELETE MODAL-->
    <div class="container container-fluid">
        <div class="modal fade" id="deletecoursemodal" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="managecoursedata.php" method="POST">
                        <center>
                            <input type="hidden" name="id" id="deletecourseid">

                            <div class="modal-body">
                                Are you sure you want to delete this College Department?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" name="delete_course" class="btn btn-danger">Yes</button>
                            </div>                     
                        </center>
                    </form>
                </div>
            </div>
        </div
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