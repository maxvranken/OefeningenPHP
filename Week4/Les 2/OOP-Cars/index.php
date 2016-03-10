<?php

include_once("classes/Car.class.php");
include_once("classes/Truck.class.php");

if( !empty( $_POST ) ){


    // er is gesubmit
    if( $_POST['maxload'] == "" ){

        try {
            // car
            $car = new Car();
            $car->Brand = $_POST['brand'];
            $car->Price = $_POST['price'];
            if ($car->Save()) {
                $succes = "car saved";
            } else {
                $error = "car NOT saved";
            }
        } catch(Exception $e){
            $error = $e->getMessage();
        }
    }else{
        $truck = new Truck();
        $truck->Brand = $_POST['brand'];
        $truck->Price = $_POST['price'];
        $truck->Maxload = $_POST['maxload'];
        if( $truck->Save() ){
            echo "truck saved";
        }else{
            echo "truck NOT saved";
        }
    }
}

?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OOP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="row header">
        <h1>ADD A CAR &nbsp;</h1>
        <?php if(isset($error)):  ?>
        <h3 style="color: red;"><?php echo $error; ?></h3>
        <?php elseif(isset($succes)): ?>
            <h3><?php echo $succes; ?></h3>
        <?php else: ?>
        <h3>Fill out the form below to add cars!</h3>
        <?php endif; ?>
    </div>
    <div class="row body">
        <form action="" method="post">
            <ul>

                <li>
                    <p class="left">
                        <label for="brand">Brand</label>
                        <input id="brand" type="text" name="brand" placeholder="mercedes" />
                    </p>
                    <p class="pull-right">
                        <label for="price">Price</label>
                        <input id="price" type="number" name="price" placeholder="" />
                    </p>
                </li>


                <li><div class="divider"></div></li>
                <li>
                    <p>
                        <label for="maxload">If this is a transport van, what is the maximum load (in kg) <span class="req">*</span></label>
                        <input id="maxload" type="text" name="maxload" placeholder="5500" />
                    </p>
                </li>

                <li>
                    <input class="btn btn-submit" type="submit" value="Submit" />
                    <small>or press <strong>enter</strong></small>
                </li>

            </ul>
        </form>
    </div>
</div>


</body>
</html>