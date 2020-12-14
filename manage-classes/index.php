<?php 

include '../components/header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Choose your courses</h1> 
   <table border='1'>
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Course Number</th>
                <th>Day/Time</th>
                <th>Cost</th>
                <th>Description</th>
                <th>Credits</th>
                <th>Instructor</th>
            </tr> 
        </thead>
        <tbody>
            <form action="drop_process.php" method="POST">
            <?php include 'list_enrolled_courses.php'; ?>
        </tbody>
   </table>
            <button type="submit">Drop</button>
            </form>

<?php include '../components/footer.php';