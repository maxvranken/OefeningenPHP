<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a task</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Your To-Dos</h1>
            <div class="alert alert-info" role="alert">You have <?php echo $mvctodo->num_rows(); ?> todo's</div>
            <ul class="list-group">
                <?php foreach ($mvctodo->result() as $todo): ?>
                    <button type="button" class="list-group-item"><?php echo $todo->todo_name; ?></button>
                <?php endforeach; ?>
            </ul>
            <a href="add">
                <button class="btn btn-success">Add Todo</button>
            </a>
        </div>
    </div>
</div>
</body>
</html>