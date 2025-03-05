<?php
// Include the database connection file
include 'db_connection.php';
// Initialize an array to store error messages
$error =[];
// Handle POST requests
if($_SERVER['REQUEST_METHOD']==='POST'){
    // Get the task ID from the POST request 
    $id = isset($_POST['id'])?intval($_POST['id']):0;

    // Prepare an SQL statement to select the task with the given ID
    $sql = "SELECT * FROM tasks WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i",$id);     // Bind the ID parameter
    $stmt->execute();               // Execute the query
    $result = $stmt->get_result();  // Get the result of the query
    $task = $result->fetch_assoc(); // Fetch the task data as an associative array

    // Check if the task exists; if not, display an error message
    if (!$task) {
        echo "Task not found with the ID: " . $id;
    }

    // Retrieve form data and sanitize it
    $task_description = isset($_POST['task_description'])?htmlspecialchars($_POST['task_description']):"";
    $priority = isset($_POST['priority'])?htmlspecialchars($_POST['priority']):"";
    $status = isset($_POST['status'])?htmlspecialchars($_POST['status']):"";
    $deadline = isset($_POST['deadline'])?htmlspecialchars($_POST['deadline']):"";

    // Check if the update task button was clicked
    if(isset($_POST['update_task'])){
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

        // If there are no validation errors, proceed to update the task
        if(empty($errors)){
            // Prepare the SQL statement to update the task
            $update_sql = "UPDATE  tasks SET description = ?, priority = ?,status = ?, deadline = ? WHERE id =?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ssssi",$task_description, $priority,$status, $deadline, $id);   // Bind parameters

            // Execute the update query and check if it was successful
            if($update_stmt->execute() === TRUE){
                // Redirect to the index page after a successful update
                header("Location: index.php");
            }else {
                // Display an error message if the update failed
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
    <!-- Link to the external CSS file -->
    <link rel="stylesheet" href="styles.css">

    
</head>
<body>
    <div class="form_container">
        <h1>Update Task</h1>
        <!-- Display any validation errors -->
        <?php if(!empty($errors)): ?>
        <?php foreach($errors as $error): ?>
        <h3 id="error"><?php echo $error ?></h3>
        <?php endforeach ?>
        <?php endif; ?>
        <!-- Form for updating the task -->
        <form method ="POST" action="">
            <input type="hidden" name="id" value="<?php echo $task['id']; ?>">

            <!-- Task description input -->
            <label for="task_description">Task Description:</label><br>
            <input type="text" id="task_description" name="task_description" value="<?php echo $task['description'];?>"> <br>

            <!-- Priority selection -->
            <label for="priority">Priority:</label><br>
            <select id="priority" name="priority">
                <option value="High"<?php echo $task['priority']==='High'?'selected':''; ?>>High</option>
                <option value="Medium"<?php echo $task['priority']==='Medium'?'selected':''; ?>>Medium</option>
                <option value="Low"<?php echo $task['priority']==='Low'?'selected':'';?>>Low</option>
            </select><br>

            <!-- Status selection -->
            <label for="status">Status:</label><br>
            <select id="status" name="status">
                <option value="Completed"<?php echo $task['status']==='Completed'?'selected':''; ?>>Completed</option>
                <option value="Not Completed"<?php echo $task['status']==='Not Completed'?'selected':''; ?>>Not Completed</option>
            </select><br>

             <!-- Deadline input -->
            <label for="deadline">Deadline:</label><br>
            <input type="datetime-local" id="deadline" name="deadline" value="<?php echo $task['deadline']; ?>"><br>

            <!-- Submit button for updating the task -->
            <input type="submit"  name ="update_task" value="Update Task"><br>

            <!-- Cancel button to return to the index page -->
            <div class="cancel-container">
                <a href="index.php"><input type="button" name= "cancel" value="cancel"></a><br>
            </div>
        </form>
    </div>
    
</body>
</html>