# ToDo App

This is a simple ToDo application built with PHP for the backend, utilizing MySQL for the database. The application allows users to perform CRUD (Create, Read, Update, Delete) operations on their tasks.

## Features

- **Create**: Add new tasks to your to-do list.
- **Read**: View all tasks.
- **Update**: Edit existing tasks.
- **Delete**: Remove tasks from the list.

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- XAMPP (recommended for local development)

## Installation

### Step 1: Download and Install XAMPP

1. Download XAMPP from the [official website](https://www.apachefriends.org/index.html).
2. Follow the installation instructions for your operating system.

### Step 2: Set Up the Database

1. Start XAMPP and ensure that Apache and MySQL are running.
2. Open phpMyAdmin by navigating to `http://localhost/phpmyadmin` in your browser.
3. Create a new database called `todo_app`.
4. Run the following SQL script to create the `tasks` table:

```sql
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

```
### Step 3: Configure the Project

1. Download the project files and place them in the `htdocs` directory of your XAMPP installation.
2. Rename `config.example.php` to `config.php`.
3. Open `config.php` and update the database configuration to match your setup:

    ```php
    <?php
    $host = 'localhost';
    $dbname = 'todo_app';
    $username = 'root';
    $password = ''; // Default XAMPP MySQL password is empty
    ?>
    ```

### Step 4: Run the Application

1. Open your browser and navigate to `http://localhost/todo-app` (assuming the project folder is named `todo-app`).
2. You should see the ToDo App homepage where you can start adding tasks.

## Usage

### Adding a Task

1. Go to the homepage.
2. Fill out the form with the task title and description.
3. Click "Add Task".

### Viewing Tasks

- All tasks will be listed on the homepage.

### Editing a Task

1. Click the "Edit" button next to the task you want to update.
2. Modify the task details in the form.
3. Click "Update Task".

### Deleting a Task

1. Click the "Delete" button next to the task you want to remove.
2. Confirm the deletion.
