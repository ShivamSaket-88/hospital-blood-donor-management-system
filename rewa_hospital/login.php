<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>

<header><h2>Hospital Login</h2></header>

<div class="container">
<div class="page-title">Login to Dashboard</div>

<form method="post">
    <input type="text" name="user" placeholder="Username">

    <input type="password" name="pass" id="loginPass" placeholder="Password">
    <button type="button" class="toggle" onclick="togglePassword('loginPass')">
        Show / Hide Password
    </button>

    <button name="login">Login</button>
</form>

<?php
if(isset($_POST['login'])){
    $q = mysqli_query($conn,"SELECT * FROM rewa_hospital_admin
    WHERE username='$_POST[user]' AND password='$_POST[pass]'");
    if(mysqli_num_rows($q)==1){
        $_SESSION['user']=$_POST['user'];
        header("Location: dashboard.php");
    }else{
        echo "<p class='error'>Invalid Username or Password</p>";
    }
}
?>
</div>

</body>
</html>
