<?php
  include('content/header.php'); 
  include('content/navbar.php'); 
?>

 <!-- ADD NEW CURRICULUM POPUP -->
 <div class="container container-fluid">
        <div class="modal fade" id="addCurriculum" tabindex="-1" aria-labelledby="addCurriculumLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="addCurriculumLabel">Create New Curriculum</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" class="form-control">&times</button>
                    </div>

                    <div class="modal-body">
                        <!-- Inputs -->

                        <form action="managecurriculumdata.php" method="POST">

                            <div class="mb-3">
                                <label for="cmo" class="form-label">CMO</label>
                                <span id="emailHelp" class="">(CHED Memorandum Order)</span>                           
                                <textarea rows="3" cols="50" name="CMO" class="form-control" id="cmo" placeholder="Enter text here..." required></textarea>                       
                            </div>

                            <div class="mb-3">
                                <label for="board" class="form-label">Board Resolution</label>
                                <textarea rows="3" cols="50" name="BoardResolution" class="form-control" id="board" placeholder="Enter text here..."required></textarea> 
                            </div>

                            <div class="mb-3 ">
                                <label for="">Effective S.Y.</label>
                                <div class="row">
                                    <div class="col mb-3 w-50">
                                        <input type="number" class="form-control" placeholder="From" id="SYfrom" name="SYfrom">
                                    </div>
                                    <div class="col w-50">
                                        <input type="number" class="form-control" placeholder="To" id="SYto" name="SYto" >
                                    </div>
                                </div>
                            </div>

                            <!-- Course -->		
                            <div class="container p-0 mb-3" id="select-course">
                                <label for="#select-course" class="form-label" >Course</label>
                                <select class="custom-select p-2 " id="select-course" name="coursecode" required>
                                    <option value="" selected>Select Course for this Curriculum...</option>
                                    <?php
                                        $CollegeID = $_SESSION['college_id_fk'] ;
                                        $getcourse = mysqli_query($connection,"SELECT * FROM tblcourse where college_id_fk=$CollegeID");

                                        while($fac = mysqli_fetch_array($getcourse))
                                        {
                                            $course = $fac['course'];
                                            $coursecode = $fac['coursecode'];
                                            echo "<option value='$coursecode'>".$course."</td>";
                                        }
                                    ?>
                                    </select>
                                <!-- FETCH COURSES FROM DATABASE --> 			
                            </div>

                            <div class="mb-3">
                                <label for="board" class="form-label">
                                Other Details(if any)</label>
                                <textarea rows="3" cols="50" name="otherdetails" class="form-control" id="board" placeholder="Enter text here..."></textarea> 
                            </div>		

                            <div align="right">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="add" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD CURRICULUM END -->


<div class="container-fluid">

<!-- Add Admin -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="mb-3 fw-bold text-danger font-weight-bold  text-center ">Curriculum List<br>
    </h2>
    <button type="button" class="btn btn-danger rounded-pill " data-toggle="modal" data-target="#addCurriculum">
      Add Curriculum
    </button>
  </div>

  <div class="card-body shadow ">
        <div class="text-white text-center">
            <form action="getcurrid.php" method="POST" >
                <?php
                    $getcur =mysqli_query($connection, "SELECT * from tblcurriculum");
                    while($fa = mysqli_fetch_array($getcur)){
                        $currid = $fa['id'];
                        $currcode = $fa['curr_code'];

                        echo "<input type='hidden' name='id' value='". $currid."'>";
                        echo  "<div class='bg-danger m-2 p-2 mb-2 text-center '><button type='submit' name='getidbtn' class='curridbtn bg-danger border-0 text-white' value='".$currcode."'>".$currcode."<button></div>";
                        
                    }

                ?>
            </form>
        </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<script src="js/showpassword.js"></script>
<?php
include('content/scripts.php');
include('content/footer.php');
?>