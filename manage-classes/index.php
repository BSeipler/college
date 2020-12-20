<?php 

include '../components/header.php';

?>

<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Choose classes to drop.</h1> 
        </div>
    </div>
</div>

<div class="container" id="coursesList">
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <td>Course Name</td>
                        <td>Course Number</td>
                        <td>Day/Time</td>
                        <td>Cost</td>
                        <td>Description</td>
                        <td>Credits</td>
                        <td>Instructor</td>
                        <td>Add</td> 
                    </tr> 
                </thead> 
                <tbody>
                    <form action="drop_process.php" method="POST">
                    <?php include 'list_enrolled_courses.php'; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button class="btn btn-primary float-right" type="submit">Confirm Drop</button>
            </form>
        </div> 
    </div>
</div>

<?php include '../components/footer.php';