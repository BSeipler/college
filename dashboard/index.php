<?php include '../components/header.php'; ?>
   <h1>Dashboard</h1> 
   <h3>Welcome <?=$_SESSION['firstname']?></h3>
   <table>

   </table>
   <?php include 'enrolled_courses.php'; 
         include '../components/footer.php';
   ?>
   <a href="../enrollment/">Enroll in more classes</a>
   <a href="../manage-classes/">Drop classes</a>