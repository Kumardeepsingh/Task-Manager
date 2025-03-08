Task Management System

This is a simple web-based Task Management System that allows users to create, update, and delete tasks. Tasks can be marked as completed, and each task can have a priority and deadline. The system is built using PHP and MySQL for the backend and HTML/CSS for the frontend.

Features
Create Tasks: Users can add new tasks by specifying a description, priority, and deadline.
Update Tasks: Users can update existing tasks, including modifying the description, priority, status, and deadline.
Delete Tasks: Users can delete tasks that are no longer needed.
Mark as Completed: Users can mark tasks as completed.
Task List: All tasks are displayed in a list format with the ability to edit or delete each task.

Technology Stack
Frontend: HTML, CSS
Backend: PHP
Database: MySQL
Tools: XAMPP for MySQL and Apache

Installation and Setup
1. Clone the Repository
2. Set Up a Local Server (XAMPP)
Install XAMPP if you haven't already.
Start Apache and MySQL using the XAMPP control panel.
3. Create the Database
Open phpMyAdmin by going to http://localhost/phpmyadmin.
Create a new database named task_manager using the following SQL command:

CREATE DATABASE task_manager;

create the tasks table:

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    priority VARCHAR(10) NOT NULL,
    status VARCHAR(20) DEFAULT 'Not Completed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deadline DATETIME
);
4. Configure the Database Connection
Navigate to the project directory and open the db_connection.php file.
Update the database connection parameters (if necessary):

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_manager";

5. Add the Project to XAMPP
Place the project folder in the htdocs directory in XAMPP.
You can now access the project in your browser by going to http://localhost/task-manager.
6. Run the Project
Open a browser and navigate to http://localhost/task-manager/index.php.
You should see the task management interface where you can add, update, delete, and manage tasks.
Usage
Add Task: Click the "Add Task" button to create a new task. Provide a description, priority, and deadline.
Edit Task: Click the "Edit" button next to a task to update its details.
Mark as Completed: Click the "Mark as Completed" button to update the status of a task.
Delete Task: Click the "Delete" button to remove a task from the list.

Screenshots

Index page when there are no tasks in the database 
![10](https://github.com/user-attachments/assets/1b94b03e-78cb-4cad-8402-68fe994cb890)
When Add Task button is clicked 
![11](https://github.com/user-attachments/assets/89e89a47-7613-4e68-bdd6-e8ebafa17871)
Add Task button clicked without filling all fields 
![12](https://github.com/user-attachments/assets/b54aa9ed-e31c-4655-92c3-71999b30aa98)
Add Task button clicked with filling all fields 
![13](https://github.com/user-attachments/assets/e8d0c100-10de-4143-8683-da6d0e3e97ba)
Database after adding task 
![14](https://github.com/user-attachments/assets/2092d964-c93b-498b-bc2e-5ff068573cba)
Mark as Complete button clicked 
![15](https://github.com/user-attachments/assets/450eac2f-a0fe-4044-b963-eff9989d4f5c)
Database after clicking Mark as Complete button 
![16](https://github.com/user-attachments/assets/bf8fc6d7-d362-4d79-9cfd-91b5884e6a75)
Clicking the edit button and setting priority to low 
![17](https://github.com/user-attachments/assets/2ceddd66-44d9-4304-b852-4c3e7d47ebbf)
After clicking Update Task button 
![18](https://github.com/user-attachments/assets/b5f3497c-1d91-4449-af6e-6a3d1d395bb8)
Database after updating task 
![19](https://github.com/user-attachments/assets/116008c6-4fff-4b8a-a6e9-4af9d45b42ea)
Delete Button Clicked 
![20](https://github.com/user-attachments/assets/f194c93a-283d-4cb8-8315-d4543a07d93b)
After clicking ok 
![21](https://github.com/user-attachments/assets/3ff8c868-82e2-44b1-b6ba-62362c18b898)
Database after Clicking Delete Button 
![22](https://github.com/user-attachments/assets/5fe300c0-111f-4e59-a478-5e9cf2e38fe2)










