<?php session_start();

include '../utils/db_credentials.php';

$studentId = $_SESSION['student_id'];

foreach ($_POST['courses'] as $courseId) {
    $statement = "DELETE FROM enrollments WHERE student_id = '$studentId' AND course_id = '$courseId'";
    $pdo->exec($statement); 
}

header('Location: ../dashboard'); 