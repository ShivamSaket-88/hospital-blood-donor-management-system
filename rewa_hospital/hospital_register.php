<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Hospital Signup</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/script.js"></script>
</head>
<body>

<header><h2>Hospital Signup</h2></header>

<div class="container">
<div class="page-title">Hospital Registration</div>

<form method="post">
    <input type="text" name="hname" placeholder="Hospital Name">
    <input type="text" name="city" placeholder="City">
    <input type="text" name="username" placeholder="Username">

    <input type="password" name="password" id="signupPass" placeholder="Password">
    <button type="button" class="toggle" onclick="togglePassword('signupPass')">
        Show / Hide Password
    </button>

    <button name="register">Register</button>
</form>

<?php
if(isset($_POST['register'])){
    mysqli_query($conn,"INSERT INTO rewa_hospital_admin
    (hospital_name,city,username,password)
    VALUES
    ('$_POST[hname]','$_POST[city]','$_POST[username]','$_POST[password]')");
    echo "<p class='success'>Hospital Registered Successfully</p>";
    header("refresh:1;url=login.php");
}
?>
</div>

</body>
</html>
