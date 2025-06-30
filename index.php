<!DOCTYPE html>
<html>
<head>
    <title>Attendance Form</title>
</head>
<body>
    <h2>Student Attendance Form</h2>
    <form action="submit.php" method="post">
        <label>Student Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Roll Number:</label>
        <input type="text" name="roll_no" required><br><br>

        <label>Status:</label>
        <select name="status" required>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
