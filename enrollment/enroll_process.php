<?php session_start();

include '../utils/db_credentials.php';

$studentId = $_SESSION['student_id'];

foreach ($_POST['courses'] as $courseId) {
    $statement = $pdo->prepare("INSERT INTO enrollments (student_id, course_id)
    VALUES (:studentId, :courseId)");

    $statement->bindValue(':studentId', $studentId);
    $statement->bindValue(':courseId', $courseId);
    $statement->execute(); 
}

header('Location: ../dashboard'); 