<?php



?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add tasks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <div class="row">
        <h1>Add a new task</h1>
        <form action="" method="POST">
            <?php if (!empty($feedback)): ?>
                <div class="alert alert-succes"><?php echo $feedback; ?></div>
            <?php endif; ?>

            <?php echo validation_errors(); ?>
            <div class="form-group">
                <label for="task">Task name: </label>
                <input type="text" class="form-control" id="task" name="todo_name">
            </div>

            <button type="submit" class="btn btn-success">Add task!</button>

        </form>
        <a href="all"><button class="btn btn-default" style="margin-top: 10px">View todo's</button></a>

    </div>
</div>

</body>
</html>