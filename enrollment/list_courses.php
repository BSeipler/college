<?php 
include '../utils/db_credentials.php';

$studentId = $_SESSION['student_id'];

$courses = [];

/* Make database query to grab the students info */
$statement = $pdo->prepare("SELECT course_id FROM enrollments WHERE student_id = '$studentId'");
$statement->execute();
$courseIds = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($courseIds) {
  foreach ($courseIds as $course) {
    array_push($courses, $course['course_id']);
  }
}

$statement = $pdo->prepare("SELECT * FROM courses WHERE status = '1'");
$statement->execute();
$activeCourses = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($activeCourses as $course) {
  if (!in_array($course['course_id'], $courses)) { ?>
    <tr>
        <td><?=$course['course_name'];?></td> 
        <td><?=$course['course_number'];?></td> 
        <td><?=$course['day/time'];?></td> 
        <td>$<?=$course['cost'];?></td> 
        <td><?=$course['description'];?></td> 
        <td><?=$course['credits'];?></td> 
        <td><?=$course['instructor'];?></td> 
        <td>
            <input type="checkbox" name="courses[]" value="<?=$course['course_id'];?>"> 
        </td>
    </tr>
<?php
  }
} 