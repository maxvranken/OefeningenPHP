<?php
//Eerst bouwen we onze applicatie uit zodat ze werkt, ook zonder JavaScript

include_once("classes/Activity.class.php");
$activity = new Activity();

//controleer of er een update wordt verzonden
if (!empty($_POST['activitymessage'])) {
    $activity->Text = $_POST['activitymessage'];
    try {
        $activity->Save();
    } catch (Exception $e) {
        $feedback = $e->getMessage();
    }
}

//altijd alle laatste activiteiten ophalen
$recentActivities = $activity->GetRecentActivities();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>IMDBook</title>
    <link href="css/reset.css" rel="stylesheet"/>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.1.min.js"></script>

    <script>

        $(document).ready(function () {

            $("#btnSubmit").on("click", function (e) {
                    //message ophalen uit het textvak
                    var message = $("#activitymessage").val();

                    //AJAX call: verzenden naar PHP file(om query uit te voeren)
                    $.post( "ajax/savemessage.php", { message: message })
                        .done(function( response ) {
                            if(response.status == 'succes'){
                                //uodate smooth laten verschijnen
                                var li = "<li style='display: none;'><h2>Goodbytes.be</h2>"+message+"</li>";
                                $("#listupdates").prepend(li);
                                $("#listupdates li:first-child").slideDown();
                            }
                        });



                    e.preventDefault();//submit tegenhouden
            });
        });
    </script>

    <style type="text/css">
        body {
            font-family: "Lucida Grande", Tahoma, Verdana, sans-serif;
        }

        h1 {
            margin-bottom: 5px;
        }

        h2 {
            color: #3b5998;
            display: inline;
        }

        ul {
            margin-top: 10px;
        }

        ul li {
            border-bottom: 1px dotted #fff;
            padding: 15px 5px;
        }

        #activitymessage {
            border: 1px solid #bbbbbb;
            padding: 5px;
            width: 280px;
            font-size: 1.1em;
        }

        div.statusupdates {
            width: 380px;
            background-color: #ccc;
            padding: 20px;
            margin: 0 auto;
        }

        #btnSubmit {
            background-color: #627aac;
            color: #fff;
            font-size: 1.1em;
            border: 1px solid #29447e;
        }

        div.errors {
            width: 380px;
            margin: 25px auto;
            background-color: #bd273a;
            -moz-border-radius: 10px;
            color: white;
            font-weight: bold;
            text-shadow: 1px 1px 1px #000;
            padding: 20px;
            display: none;
        }
    </style>
    <script type="text/javascript">


    </script>
</head>
<body>
<div>
    <div class="errors"></div>

    <form method="post" action="">
        <div class="statusupdates">
            <h1>GoodBytes.be</h1>
            <input type="text" value="What's on your mind?" id="activitymessage" name="activitymessage"/>
            <input id="btnSubmit" type="submit" value="Share"/>

            <ul id="listupdates">
                <?php
                if (count($recentActivities) > 0) {
                    foreach ($recentActivities as $key => $singleActivity) {
                        echo "<li><h2>GoodBytes.be</h2> " . $singleActivity['activity_description'] . "</li>";
                    }
                } else {
                    echo "<li>Waiting for first status update</li>";
                }
                ?>
            </ul>

        </div>
    </form>

</div>
</body>
</html>