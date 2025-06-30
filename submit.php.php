<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";  // same name as your phpMyAdmin database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$roll_no = $_POST['roll_no'];
$status = $_POST['status'];

$sql = "INSERT INTO students (name, roll_no, status) VALUES ('$name', '$roll_no', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "Attendance marked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
