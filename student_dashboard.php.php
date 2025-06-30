<?php
session_start();
if (!isset($_SESSION['student_logged_in'])) {
    header("Location: student_login.html");
    exit();
}

$roll_no = $_SESSION['roll_no'];
$conn = new mysqli("localhost", "root", "", "attendance_db");

$sql = "SELECT * FROM attendance WHERE roll_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $roll_no);
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <style>
    body { font-family: 'Poppins', sans-serif; background-color: #f4f6f8; padding: 30px; }
    .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
    h2 { text-align: center; color: #27ae60; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 12px; text-align: center; border-bottom: 1px solid #ddd; }
    th { background-color: #27ae60; color: white; }
    tr:hover { background-color: #f9f9f9; }
    .logout { text-align: center; margin-top: 20px; }
    .logout a { text-decoration: none; color: red; font-weight: bold; }
  </style>
</head>
<body>
  <div class="container">
    <h2>📘 Attendance for Roll No: <?php echo htmlspecialchars($roll_no); ?></h2>
    <table>
      <tr>
        <th>Date</th>
        <th>student Name</th> 
        <th>Roll No</th>
        <th>Status</th>
      </tr>
      <?php
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>{$row['date']}</td>
                      <td>{$row['student_name']}</td>
                      <td>{$row['roll_no']}</td>
                      <td>{$row['status']}</td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='4'>No attendance records found.</td></tr>";
      }
      ?>
    </table>
    <div class="logout">
      <a href="logout.php">🚪 Logout</a>
    </div>
  </div>
</body>
</html>
