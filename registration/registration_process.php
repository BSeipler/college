<?php session_start();

include '../utils/db_credentials.php';

/* Filter the incoming inputs */
foreach ($_POST as $k => $v) {
    if ($k === 'email') {
        $_POST[$k] = filter_var($v, FILTER_SANITIZE_EMAIL);
    } else if ($k === 'password') {
        continue;
    } else {
        $_POST[$k] = filter_var($v, FILTER_SANITIZE_STRING);
    }
}

/* Reassign the user variables */
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$streetAddress = $_POST['street_address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zipcode = $_POST['zipcode']; 
$gender = $_POST['gender'];
$specialNeeds = $_POST['special_needs'];

/* Check if student already exists by email */
$statement = $pdo->prepare("SELECT email FROM students WHERE email = '$email'");
$statement->execute();
$student = $statement->fetchAll(PDO::FETCH_ASSOC);

/* Send student to login if they exist */
if ($student) {
    header('Location: ../login');
    exit;
}

/* encrypt the password */
$hash = password_hash($_POST['password'], PASSWORD_ARGON2ID);

$statement = "INSERT INTO students (firstname, lastname, email, phone, street_address, city, state, zipcode, gender, special_needs, password)
VALUES ('$firstname', '$lastname', '$email', '$phone', '$streetAddress', '$city', '$state', '$zipcode', '$gender', '$specialNeeds', '$hash')";

$pdo->exec($statement);

$statement = $pdo->prepare("SELECT * FROM students WHERE email = '$email'");
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