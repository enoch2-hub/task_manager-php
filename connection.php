<?php

$serverName = "DESKTOP-5EEM8V7";
$dbName = "task_manager_db";
$uid = "";
$pwd = "";

$connection = [
    "Database" => $dbName,
    "UID" => $uid,
    "PWD" => $pwd
];

$conn = sqlsrv_connect($serverName, $connection);

if(!$conn){
    die(print_r(sqlsrv_errors(), true));
}
else {
    echo "Connected";
    
    // Query to retrieve files from the database
    $sql = "SELECT * FROM files";
    $result = sqlsrv_query($conn, $sql);

    if ($result === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    // Display files
    echo "<h2>Files:</h2>";
    echo "<ul>";
    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
        $fileId = $row['file_id'];
        $fileName = $row['file_name'];
        // You may need to handle the file content depending on the type of file stored
        // For example, for binary files, you may need to decode them before displaying
        // $fileContent = base64_encode($row['file_content']); // Example if file content is stored as base64 encoded string
        
        echo "<li><a href='view_file.php?id=$fileId'>$fileName</a></li>";
    }
    echo "</ul>";
    
    // Free the result set
    sqlsrv_free_stmt($result);
}

?>
