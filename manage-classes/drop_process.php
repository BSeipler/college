<?php session_start();

include '../utils/db_credentials.php';

$studentId = $_SESSION['student_id'];

foreach ($_POST['courses'] as $courseId) {
    $statement = $pdo->prepare("DELETE FROM enrollments WHERE student_id = :studentId AND course_id = :courseId");
    $statement->bindValue(':studentId', $studentId);
    $statement->bindValue(':courseId', $courseId);
    $statement->execute(); 
}

header('Location: ../dashboard'); 