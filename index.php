<?php 
//connect to the database
$db = mysqli_connect('localhost','root', '', 'todo');
    if(isset($_Post['submit'])){
        $task = $_POST['task'];
        if(empty($task)){
            $errors = "You must fill in the task";
        }else{
        mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
        header('location: index.php');
        }
        
    }

    $tasks = mysqli_query($db, "SELECT * FROM tasks");
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PRIMEROS PASOS CON BRACKETS</title>
        <meta name="description" content="Una guía interactiva de primeros pasos para Brackets.">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="heading">
        <h2>Todo list application with PHP and MySQL
        </h2>
        </div>
        
        <form method="POST" action="index.php">
            <input type="text" name="task" class="task_input">
            <button type="submit" class="add_btn" name="submit">AddTask</button>
            
            <table>
            <thead>
                <tr>
                <th>N</th>
                <th>Task</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td class="task">This is the first task placeholder</td>
                    <td class="delete">
                    <a href="#"></a></td>
                    </tr>
                </tbody>
            </table>
        </form>

    </body>
</html>