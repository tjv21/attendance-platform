<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roll_no = $_POST["roll_no"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM students WHERE roll_no = ? AND password = ?");
    $stmt->bind_param("ss", $roll_no, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['roll_no'] = $roll_no;
        $_SESSION['student_logged_in'] = true; // ✅ THIS LINE IS IMPORTANT
        header("Location: student_dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid Roll Number or Password'); window.location.href='student_login.html';</script>";
    }
}
?>
