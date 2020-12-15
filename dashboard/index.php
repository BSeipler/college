<?php include '../components/header.php'; ?>
<div class="container">
      <div class="row text-center">
            <div class="col">
                  <h1>Dashboard</h1>
            </div>
</div>
<div class="container">
      <div class="row text-center">
            <div class="col">
                  <h3>Welcome <?=$_SESSION['firstname']?></h3>
            </div>
            <div class="col">
                  <h3>Enrolled Courses</h3>
                  <table class="table table-bordered">
                        <thead>
                              <tr>
                                    <th>Course Name</th> 
                              </tr> 
                        </thead>
                        <tbody>
                              <?php include 'enrolled_courses.php'; ?> 
                        </tbody>
                  </table> 
                  <div class="d-flex justify-content-around">
                        <a href="../enrollment/">Enroll in more classes</a>
                        <a href="../manage-classes/">Drop classes</a>
                  </div>
            </div>
      </div>
</div>
   <?php 
         include '../components/footer.php';
   ?>