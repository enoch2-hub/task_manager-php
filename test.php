<?php
//-----Database

//Db Parameters
$serverName = "DESKTOP-5EEM8V7";
$dbName = "task_manager_db";
$uid = "";
$pwd = "";

//Connection
$connection = [
    "Database" => $dbName,
    "UID" => $uid,
    "PWD" => $pwd
];

$conn = sqlsrv_connect($serverName, $connection);

//Check connection
if(!$conn){
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Connected";

    // Retrieve tasks from the database
    $sql = "SELECT * FROM tasks";
    $result = sqlsrv_query($conn, $sql);

    // Check if query execution was successful
    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Display tasks in a table
    if (sqlsrv_has_rows($result)) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Task Description</th></tr>";

        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["task_description"] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "No tasks found";
    }

    // Free the statement resources
    sqlsrv_free_stmt($result);
}

// Close the database connection
sqlsrv_close($conn);
?>







$sql = "INSERT INTO tasks (task_description) VALUES ('$task')";
