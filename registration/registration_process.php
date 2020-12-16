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
$profilePictureFile = $_FILES['profilePicture'];

/* Function to randomly generate a file name for the profile picture incase it already exists */
function getRandomName($n) { 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
    $randomString = ''; 
  
    for ($i = 0; $i < $n; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString .= $characters[$index]; 
    } 
  
    return $randomString; 
} 

/* Function to check to see if the profile picture filename is already taken */
$newFileName = '';
function checkIfFileNameExistsInUploadsAndPlace ($file='') {
    if (!$file) {
        return;
    } 
    $fileName = $file['name'];
    $str = explode('.', $fileName); 
    while (file_exists('../uploads/profile-pictures/' . $fileName)) {
        $fileName = getRandomName(10); 
    } 
    $str[0] = $fileName; 
    $GLOBALS['newFileName'] = implode('.', $str); 
    $path = '../uploads/profile-pictures/' . $GLOBALS['newFileName']; 
    move_uploaded_file($file['tmp_name'], $path);
}

checkIfFileNameExistsInUploadsAndPlace($profilePictureFile);

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

$statement = "INSERT INTO students (firstname, lastname, email, phone, street_address, city, state, zipcode, gender, special_needs, password, profile_picture)
VALUES ('$firstname', '$lastname', '$email', '$phone', '$streetAddress', '$city', '$state', '$zipcode', '$gender', '$specialNeeds', '$hash', '$newFileName')";

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
      $_SESSION['profile_picture'] = $student[0]['profile_picture'];
      header('Location: ../dashboard'); 
      exit();
  }
  header('Location: index.php'); 
} else {
  header('Location: index.php'); 
} 