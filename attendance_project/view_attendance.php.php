<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'attendance_db';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$search = '';
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM attendance WHERE student_name LIKE '%$search%' OR date LIKE '%$search%' ORDER BY date DESC";
} else {
    $sql = "SELECT * FROM attendance ORDER BY date DESC";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f4f6f8;
        }

        h1 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 300px;
            font-size: 16px;
            border: 1px solid #aaa;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4a90e2;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>

<h1>Attendance Records</h1>

<form method="get">
    <input type="text" name="search" placeholder="Search by name or date (yyyy-mm-dd)" value="<?php echo htmlspecialchars($search); ?>">
    <input type="submit" value="Search">
</form>

<table>
    <tr>
        <th>Student Name</th>
        <th>Roll No</th>
        <th>Date</th>
        <th>Status</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['student_name']."</td>
                    <td>".$row['roll_no']."</td>
                    <td>".$row['date']."</td>
                    <td>".$row['status']."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No records found</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>
