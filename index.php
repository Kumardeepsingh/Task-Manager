<?php
// Include the database connection file
include 'db_connection.php';

// Retrieve all tasks from the database
$sql = "Select * From tasks";
$result = $conn->query($sql);

// Handle POST requests
if($_SERVER['REQUEST_METHOD']==="POST"){

    // Check if the delete button was clicked
    if(isset($_POST['delete'])){
        // Get the task ID from the form
        $id = isset($_POST['id'])?intval($_POST['id']):0;

        // Prepare the SQL statement to delete the task with the given ID
        $sql = "DELETE FROM tasks WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",$id);    // Bind the ID as an integer to the SQL query

        // Execute the statement and check if the deletion was successful
        if($stmt->execute() === TRUE){
            // If successful, redirect to the index page to refresh the task list
            header("Location: index.php");
        }else {
            // If there's an error, display it
            echo "Error deleting record: " . $conn->error;
        }
    }

    // Check if the Mark as complete button was clicked
    if(isset($_POST['complete'])){
        $string_completed = 'Completed';
        $id = isset($_POST['id'])?intval($_POST['id']):0;  //// Get the task ID

        // Prepare the SQL statement to update the task status to "Completed"
        $sql = "UPDATE tasks SET status =? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si",$string_completed,$id);   // Bind status and ID to the query

        // Execute the statement and check if the update was successful
        if($stmt->execute() === TRUE){
            // Redirect to index.php to refresh the task list
            header("Location: index.php");
        }else {
            // If there's an error, display it
            echo "Error Updating record: " . $conn->error;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Mangement System</title>
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Button to add a new task -->
    <a href="add_task.php"><button class="add-task">Add Task</button></a>
    <div class="container">
            <h1>Task Management System</h1>
            <h2>Tasks</h2>

            <!-- Check if there are tasks in the database -->
            <?php if($result->num_rows>0):?>
                <!-- Loop through all the tasks and display each task -->
                <?php while($row = $result->fetch_assoc()):?>
                    <div class="task">
                        <div class="task-details">
                            <!-- Display task description, priority, status, and dates -->
                            <h3><?php echo $row['description'] ?></h3>
                            <p>Priority: <?php echo $row['priority'] ?></p>
                            <p>Status: <?php echo $row['status'] ?></p>
                            <p id="date">created on: <?php echo date("F j, Y, g:i a", strtotime($row['created_at']))  ?></p>
                            <p id="date">Deadline: <?php echo date("F j, Y, g:i a", strtotime($row['deadline']))  ?></p>
                        </div>
                        <div class="task_buttons">
                            <!-- Form to edit the task -->
                            <form method="POST" action="edit_task.php">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class ="edit" name="edit">Edit</button>
                            </form>
                            <!-- Form to mark the task as completed -->
                            <form method="POST" action="">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class ="completed" name="complete">Mark as Completed</button>
                            </form>
                            <!-- Form to delete the task -->
                            <form method="POST" action="">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class ="delete" name="delete" onclick="return confirm('Are you sure you want to delete this record')">Delete</button>
                            </form>
                        
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <!-- Display a message if no tasks are found -->
                <p id="notask">No Tasks found</p>
            <?php endif; ?>
    
    </div>
    
</body>
</html>