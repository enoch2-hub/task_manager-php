<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Task Manager</title>
</head>
<body>
    <div class="container">
        <h1>Task Manager</h1>
        
        <!-- Form to add a new task -->
        <form action="add_task.php" method="post">
            <label for="task">Task:</label>
            <input type="text" name="task" required>
            <button type="submit">Add Task</button>
        </form>

        <!-- Display existing tasks -->
        <h2>Task List</h2>
        <?php include 'view_tasks.php'; ?>



    </div>
</body>
</html>
