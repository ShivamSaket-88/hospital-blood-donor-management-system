<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Donor Registration</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/script.js"></script>
</head>
<body>

<header><h2>Blood Donor Registration</h2></header>

<div class="container">
<div class="page-title">Register as Donor</div>

<form method="post" onsubmit="return validateForm()">
    <input type="text" name="name" placeholder="Full Name">
    <input type="text" name="mobile" placeholder="Mobile Number">
    <input type="text" name="city" placeholder="City">

    <select name="blood">
        <option value="">Select Blood Group</option>
        <option>A+</option>
        <option>B+</option>
        <option>O+</option>
        <option>AB+</option>
    </select>

    <button name="submit">Register</button>
</form>

<?php
if(isset($_POST['submit'])){
    mysqli_query($conn,"INSERT INTO hospital_blood_donors
    (donor_name,mobile_number,city,blood_group)
    VALUES
    ('$_POST[name]','$_POST[mobile]','$_POST[city]','$_POST[blood]')");
    echo "<p class='success'>Donor Registered Successfully</p>";
}
?>
</div>

</body>
</html>
