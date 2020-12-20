<?php session_start();

include '../utils/db_credentials.php';

/* Filter the email input */
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

/* Make database query to grab the students info */
$statement = $pdo->prepare("SELECT * FROM students WHERE email = :email");
$statement->bindValue(':email', $email);
$statement->execute();
$student = $statement->fetchAll(PDO::FETCH_ASSOC);

/* Compare the passwords and redirect to dashboard if they match */
if ($student) {
  if (password_verify($_POST['password'], $student[0]['password'])) {
      $_SESSION['student_id'] = $student[0]['student_id'];
      $_SESSION['firstname'] = $student[0]['firstname'];
      $_SESSION['lastname'] = $student[0]['lastname'];
      $_SESSION['email'] = $student[0]['email'];
      $_SESSION['phone'] = $student[0]['phone'];
      $_SESSION['street_address'] = $student[0]['streetAddress'];
      $_SESSION['city'] = $student[0]['city'];
      $_SESSION['state'] = $student[0]['state'];
      $_SESSION['zipcode'] = $student[0]['zipcode'];
      $_SESSION['gender'] = $student[0]['gender'];
      $_SESSION['special_needs'] = $student[0]['specialNeeds']; 
      header('Location: ../dashboard'); 
      exit();
  }
  header('Location: index.php'); 
} else {
  header('Location: index.php'); 
}

