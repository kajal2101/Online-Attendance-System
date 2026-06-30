<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect("localhost", "root", "", "attendance-system");

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $roll_no = $_POST['roll_no'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    $sql = "INSERT INTO attendance (student_name, roll_no, status, date) VALUES ('$student_name', '$roll_no', '$status', '$date')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data saved successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="form-container">
        <h2>Student Attendance Form</h2>
        
        <form action="" method="POST">
            <label>Student Name:</label>
            <input type="text" name="student_name" required>

            <label>Roll No:</label>
            <input type="text" name="roll_no" required>

            <label>Status:</label>
            <select name="status" required>
                <option value="Present">Present</option>
                <option value="Absent">Absent</option>
            </select>

            <label>Date:</label>
            <input type="date" name="date" required>

            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>