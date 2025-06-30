<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "attendance_db";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['student_name'];
    $roll = $_POST['roll_no'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    $sql = "INSERT INTO attendance (student_name, roll_no, status, date) 
            VALUES ('$name', '$roll', '$status', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Attendance inserted successfully.";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}

$conn->close();
?>
