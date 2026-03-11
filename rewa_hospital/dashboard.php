<?php
session_start();
include 'db.php';
if(!isset($_SESSION['user'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header><h2>Hospital Dashboard</h2></header>

<nav>
    <a href="index.html">Home</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="container">

<div class="dashboard-card">
    <h3>Blood Donor Dashboard</h3>
    <p>City & Blood Group Wise Donor Details</p>
</div>

<form method="post">
    <input type="text" name="city" placeholder="Enter City">
    <select name="blood">
        <option>A+</option>
        <option>B+</option>
        <option>O+</option>
        <option>AB+</option>
    </select>
    <button name="search">Search Donors</button>
</form>

<?php
if(isset($_POST['search'])){
    $res = mysqli_query($conn,"SELECT * FROM hospital_blood_donors
    WHERE city='$_POST[city]' AND blood_group='$_POST[blood]'");
    echo "<table>
        <tr><th>Name</th><th>Mobile</th><th>Blood Group</th></tr>";
    while($row=mysqli_fetch_assoc($res)){
        echo "<tr>
            <td>{$row['donor_name']}</td>
            <td>{$row['mobile_number']}</td>
            <td>{$row['blood_group']}</td>
        </tr>";
    }
    echo "</table>";
}
?>
</div>

</body>
</html>
