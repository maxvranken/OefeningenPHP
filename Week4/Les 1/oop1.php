<?php

include_once ("classes/Student.class.php");

$student = new Student();
$student->Firstname = "Max '";
$student->Lastname = " Vranken ";
$student->Age = 33;


$student2 = new Student();
$student2->Firstname = "Jef";
$student2->Lastname = "Patat";
$student2->Age = 220; //fout getoond!!!

//print student 1 en 2 helemaal af
echo $student->Firstname;
echo $student->Lastname;
echo $student->Age;
echo $student2->Firstname;
echo $student2->Lastname;
echo $student2->Age;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OOP 1</title>
</head>
<body>

</body>
</html>