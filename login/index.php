<?php include '../components/header.php' ?>
   <h1>Login</h1> 
   <form action="loginProcess.php" method="POST">
    Email: <input type="email" name="email"><br>
    Password: <input type="password" name="password">
    <button type="submit">Login</button>
   </form>
<?php include '../components/footer.php' ?>