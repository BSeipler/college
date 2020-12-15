<?php 

$studentId = $_SESSION['student_id'];

include '../utils/db_credentials.php';

/* initialize an empty array to hold the course id's */
$courses = [];

/* Make database query to grab the course id's info */
$statement = $pdo->prepare("SELECT course_id FROM enrollments WHERE student_id = '$studentId'");
$statement->execute();
$courseIds = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($courseIds) {
  foreach ($courseIds as $course) {
    array_push($courses, $course['course_id']);
  }
}

/* Initialize an empty array to hold the course info */
$courseInfo = [];

/* Loop over the course id's, make database query with each id, then add the info to the course info array */
foreach ($courseIds as $course) {
  $courseId = $course['course_id'];
  $statement = $pdo->prepare("SELECT course_number, course_name FROM courses WHERE course_id = '$courseId'");
  $statement->execute();
  $result = $statement->fetchAll(PDO::FETCH_ASSOC);
  array_push($courseInfo, $result);
}

/* Loop over the course info and display it on the page */
foreach ($courseInfo as $course) {
  echo '<tr><td>' . $course[0]['course_name'] . '</td></tr>';
} 