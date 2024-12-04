<?php
// Establish a connection to the database
$connection = mysqli_connect("localhost", "root", "", "studentapplication");

// Check if the connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the 'del' parameter is set in the URL
if (isset($_GET['del'])) {
    $id = $_GET['del'];

    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM student WHERE id = ?";
    
    // Use prepared statements to prevent SQL injection
    if ($stmt = mysqli_prepare($connection, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id); // "i" indicates the type is integer
        mysqli_stmt_execute($stmt);
        
        // Check if the record was deleted successfully
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . mysqli_error($connection);
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($connection);

// Redirect back to the main page (optional)
header("Location: index.php"); // Change 'index.php' to your main page
exit();
?>