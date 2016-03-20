<?php

include_once("classes/Job.class.php");


if (!empty($_POST)) {
    if(!empty($_POST['name'])&& !empty($_POST['period'])&&!empty($_POST['description'])){
        try {
            $job = new Job();
            $job->Name = $_POST['name'];
            $job->Period = $_POST['period'];
            $job->Description = $_POST['description'];
            $job->Save();
            //var_dump($_POST);

        }catch(Exception $e){
            echo $e->getMessage();
        }

}else{
        echo "Gelieve iets in te vullen";
    }

}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jobs</title>
    <link
        href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic'
        rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<form class="center"<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="name" placeholder="Job"/>
    <input type="text" name="period" placeholder="Period"/>
    <input type="text" name="description" placeholder="Description"/></br>
    <input type="submit" name="btnAdd" value="Add a job"/>
</form>

<?php if (isset($error)): ?>

    <h3><?php echo $error; ?></h3>

<?php elseif (isset($succes)): ?>

    <h3><?php echo $succes; ?></h3>

<?php endif; ?>

<!-- The Timeline -->

<ul class="timeline">

    <?php
    $allJobs = new Job();
    $allJobs->GetAllJobs();
    ?>

</ul>

</body>
</html>