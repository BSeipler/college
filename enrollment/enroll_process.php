<?php session_start();

include '../utils/db_credentials.php';

$studentId = $_SESSION['student_id'];

foreach ($_POST['courses'] as $courseId) {
    $statement = "INSERT INTO enrollments (student_id, course_id)
    VALUES ('$studentId', '$courseId')";
    $pdo->exec($statement); 
}

header('Location: ../dashboard'); 