    <?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "attendance"; // ✅ correct DB name from your screenshot

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // ✅ Use correct table and column names from your screenshot
    $sql = "SELECT student_name, roll_no, status, date FROM attendance";
    $result = $conn->query($sql);
    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Attendance Records</title>
        <style>
            body {
                font-family: Arial;
                padding: 20px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 15px;
            }
            th, td {
                border: 1px solid #aaa;
                padding: 8px;
                text-align: center;
            }
            th {
                background-color: #2f3542;
                color: white;
            }
        </style>
    </head>
    <body>
        <h2>Attendance Records</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Roll No</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['student_name']}</td>
                            <td>{$row['roll_no']}</td>
                            <td>{$row['status']}</td>
                            <td>{$row['date']}</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No attendance records found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </body>
    </html>
