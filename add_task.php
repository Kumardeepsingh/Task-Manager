<?php
// Include the database connection file
include 'db_connection.php';
// Initialize an array to store error messages
$errors =[];
// Handle POST requests
if($_SERVER['REQUEST_METHOD']==='POST'){
    // Retrieve form data and sanitize it
    $task_description = isset($_POST['task_description'])?htmlspecialchars($_POST['task_description']):"";
    $priority = isset($_POST['priority'])?htmlspecialchars($_POST['priority']):"";
    $deadline = isset($_POST['deadline'])?htmlspecialchars($_POST['deadline']):"";

    // Check if the add_task button was clicked
    if(isset($_POST['add_task'])){
        // Validate the input data
        if(empty($task_description)){
            $errors[] = "Task description is required.";
        }
        if($priority === "Select Priority"){
            $errors[] = "Invalid priority level.";
        }
        if(empty($deadline)){
            $errors[] = "Deadline  is required";
        }

        // If there are no validation errors, proceed
        if(empty($errors)){
            // Prepare an SQL query to insert the task details into the tasks table
            $sql = "INSERT INTO tasks(description, priority, deadline) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss",$task_description,$priority,$deadline);   // Bind the parameters to the SQL query

            // Execute the query and check if the task is added successfully
            if($stmt->execute() === TRUE){
                // Redirect to the index page after successful task addition
                header("Location: index.php");
            }else {
                // Display an error message if the task failed
                echo "Error Adding record: " . $conn->error;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <!-- Link to external CSS for styling -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form_container">
        <h1>Create a New Task</h1>
        <!-- Display validation errors if there are any -->
        <?php if(!empty($errors)): ?>
        <?php foreach($errors as $error): ?>
        <h3 id="error"><?php echo $error ?></h3>
        <?php endforeach ?>
        <?php endif; ?>
        <!-- Form to add a new task -->
        <form method ="POST" action="">
            <!-- Input for task description -->
            <label for="task_description">Task Description:</label><br>
            <input type="text" id="task_description" name="task_description"><br>

            <!-- Dropdown to select priority level -->
            <label for="priority">Priority:</label><br>
            <select id="priority" name="priority">
                <option value="Select Priority">Select Priority</option>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select><br>

            <!-- Input for deadline (date and time) -->
            <label for="deadline">Deadline:</label><br>
            <input type="datetime-local" id="deadline" name="deadline"><br>

            <!-- Submit button to add the task -->
            <input type="submit"  name ="add_task" value="Add Task"><br>
            <div class="cancel-container">
                <!-- Button to cancel and return to the index page -->
                <a href="index.php"><input type="button" name= "cancel" value="cancel"></a><br>
            </div>
        </form>
    </div>
    
</body>
</html>