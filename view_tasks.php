<?php


// // Database connection parameters
// $servername = "DESKTOP-5EEM8V7";
// $username = "";
// $password = "";
// $dbname = "task_manager_db";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// } else {
//     echo "Connected";
// }


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

    if (sqlsrv_has_rows($result)) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Task Description</th></tr>";
    
        $counter = 1; // Initialize counter for numbering tasks
    
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            echo "<tr><td>" . $counter++ . "</td><td>" . $row["task"] . "</td></tr>";
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
