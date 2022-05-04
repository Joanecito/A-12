<?php
$errors   = "";
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
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header('location: index.php');
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
            <?php if (isset($errors)) { ?>
                <p><?php echo $errors; ?></p>
            <?php} ?>
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
                    <?php $i = 1; while ($row = mysqli_fetch_array($tasks)){ ?>
                        <tr>
                    <td><?php echo $i; ?></td>
                    <td class="task"><?php echo $row ['task']; ?></td>
                    <td class="delete">
                    <a href="index.php?del_task=<?php $row ['id'];?>">x</a></td>
                    </tr>

                    <?php $i++; }?>
                
                </tbody>
            </table>
        </form>

    </body>
</html>