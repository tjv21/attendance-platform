<?php
$host = "localhost";
$user = "root";
$password = ""; // XAMPP me by default password blank hota hai
$database = "attendance_db"; // ✅ correct database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
