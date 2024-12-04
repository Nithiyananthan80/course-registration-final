<?php
$connection = mysqli_connect("localhost", "root", "", "studentapplication");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['edit'])) {
    $uid = $_GET['edit'];
    $query = "SELECT * FROM student WHERE id = $uid";
    $result = mysqli_query($connection, $query);
    $student = mysqli_fetch_assoc($result);
}
if (isset($_POST['update'])) {
    $uid = $_POST['id'];
    $name = $_POST['name'];
    $coursename = $_POST['coursename'];
    $mobile = $_POST['mobile'];

    // Ensure mobile number is saved as a string to prevent auto-formatting
    $updateQuery = "UPDATE student SET name = '$name', coursename = '$coursename', mobile = '$mobile' WHERE id = $uid";
    if (mysqli_query($connection, $updateQuery)) {
        echo "Record updated successfully";
        header("Location: index.php");
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
</head>
<body>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $student['name']; ?>" required>
        <br>
        <label>Course Name:</label>
        <input type="text" name="coursename" value="<?php echo $student['coursename']; ?>" required>
        <br>
        <label>Mobile:</label>
        <input type="text" name="mobile" value="<?php echo $student['mobile']; ?>" required pattern="\d{10}" title="Please enter a valid 10-digit mobile number">
        <br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
