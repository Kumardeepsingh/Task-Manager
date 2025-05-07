# ✅ Task Management System

This is a simple web-based Task Management System built with PHP and MySQL. It allows users to create, update, delete, and manage tasks. Tasks can be marked as completed, and each task includes a priority and deadline for better tracking.

---

## 🚀 Features

- 🆕 **Create Tasks**: Add tasks with a description, priority, and deadline.
- ✏️ **Update Tasks**: Edit task details like description, priority, status, and deadline.
- ❌ **Delete Tasks**: Remove tasks that are no longer needed.
- ✔️ **Mark as Completed**: Update task status when finished.
- 📋 **Task List**: View all tasks in a clear, editable list format.

---

## 🛠️ Technology Stack

- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **Tools**: XAMPP (Apache + MySQL)

---

## ⚙️ Installation & Setup

### 1. Clone the Repository

```bash
git clone https://github.com/YourUsername/task-manager.git
```

### 2. Set Up a Local Server

- Install [XAMPP](https://www.apachefriends.org/index.html)
- Start **Apache** and **MySQL** via XAMPP Control Panel

### 3. Create the Database

- Open [phpMyAdmin](http://localhost/phpmyadmin)
- Run the following SQL commands:

```sql
CREATE DATABASE task_manager;

USE task_manager;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL,
    priority VARCHAR(10) NOT NULL,
    status VARCHAR(20) DEFAULT 'Not Completed',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    deadline DATETIME
);
```

### 4. Configure the Database Connection

Edit `db_connection.php`:

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task_manager";
```

### 5. Add Project to XAMPP

- Place the project folder into `C:/xampp/htdocs/`
- Visit [http://localhost/task-manager](http://localhost/task-manager) in your browser

---

## 💡 Usage

- **Add Task**: Click “Add Task” and fill in the required fields.
- **Edit Task**: Click “Edit” to modify task details.
- **Mark Complete**: Click “Mark as Completed” to change status.
- **Delete Task**: Click “Delete” to remove the task.

---

## 🖼️ Screenshots

**Empty Task List**  
![10](https://github.com/user-attachments/assets/1b94b03e-78cb-4cad-8402-68fe994cb890)

**Add Task Form**  
![11](https://github.com/user-attachments/assets/89e89a47-7613-4e68-bdd6-e8ebafa17871)

**Validation Alert**  
![12](https://github.com/user-attachments/assets/b54aa9ed-e31c-4655-92c3-71999b30aa98)

**Successful Task Addition**  
![13](https://github.com/user-attachments/assets/e8d0c100-10de-4143-8683-da6d0e3e97ba)

**Database After Adding Task**  
![14](https://github.com/user-attachments/assets/2092d964-c93b-498b-bc2e-5ff068573cba)

**Mark Task as Complete**  
![15](https://github.com/user-attachments/assets/450eac2f-a0fe-4044-b963-eff9989d4f5c)

**Database After Completion**  
![16](https://github.com/user-attachments/assets/bf8fc6d7-d362-4d79-9cfd-91b5884e6a75)

**Edit Priority**  
![17](https://github.com/user-attachments/assets/2ceddd66-44d9-4304-b852-4c3e7d47ebbf)

**After Update**  
![18](https://github.com/user-attachments/assets/b5f3497c-1d91-4449-af6e-6a3d1d395bb8)

**Database After Update**  
![19](https://github.com/user-attachments/assets/116008c6-4fff-4b8a-a6e9-4af9d45b42ea)

**Delete Confirmation**  
![20](https://github.com/user-attachments/assets/f194c93a-283d-4cb8-8315-d4543a07d93b)

**After Clicking OK**  
![21](https://github.com/user-attachments/assets/3ff8c868-82e2-44b1-b6ba-62362c18b898)

**Database After Deletion**  
![22](https://github.com/user-attachments/assets/5fe300c0-111f-4e59-a478-5e9cf2e38fe2)

---

## 📄 License

This project is licensed under the [MIT License](LICENSE)

---

> “A simple and effective tool to stay on top of your tasks.”
