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

    // Add task to the database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $task = $_POST["task"];

        // $sql = "INSERT INTO tasks (task_description) VALUES (?)";
        // $params = array($task);

        $sql = "INSERT INTO tasks (task) VALUES (?)";
        $params = array($task);


        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) {
            echo "Error: " . print_r(sqlsrv_errors(), true);
        } else {
            echo "Task added successfully";
            sqlsrv_free_stmt($stmt);
        }
    }
}

// Close the database connection
sqlsrv_close($conn);
?>
