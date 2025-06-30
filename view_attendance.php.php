<?php
$conn = new mysqli("localhost", "root", "", "attendance_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM attendance";
$result = $conn->query($sql);

echo "<h2>Attendance Records</h2>";
echo "<table border='1' cellpadding='10'>
<tr>
    <th>ID</th>
    <th>Student Name</th>
    <th>Roll No</th>
    <th>Status</th>
    <th>Date</th>
</tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>".$row["id"]."</td>
            <td>".$row["student_name"]."</td>
            <td>".$row["roll_no"]."</td>
            <td>".$row["status"]."</td>
            <td>".$row["date"]."</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No records found</td></tr>";
}

echo "</table>";

$conn->close();
?>
