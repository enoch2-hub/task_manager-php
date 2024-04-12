<?php
// Database connection parameters
$serverName = "DESKTOP-5EEM8V7";
$dbName = "task_manager_db";
$uid = "";
$pwd = "";

// Connection
$connectionInfo = array(
    "Database" => $dbName,
    "UID" => $uid,
    "PWD" => $pwd
);

$conn = sqlsrv_connect($serverName, $connectionInfo);

// Check connection
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Connected";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the task ID from the form submission
        $id = $_POST["id"];

        // SQL query to delete the task
        $sql = "DELETE FROM tasks WHERE id = $id";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "Task deleted successfully";
        } else {
            echo "Error deleting task: " . $conn->error;
        }
    }

}

// Close the database connection
$conn->close();
?>
