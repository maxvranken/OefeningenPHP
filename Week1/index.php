<?php
$posts = [
    [
        "picture" => "https://s3.amazonaws.com/uifaces/faces/twitter/rem/128.jpg",
        "name" => "Joris",
        "update" => "Nice! scrollen."
    ],
    [
        "picture" => "https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg",
        "name" => "James",
        "update" => "CSS Gangham style"
    ],
    [
        "picture" => "https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg",
        "name" => "James",
        "update" => "CSS Gangham style"
    ],

    [
    "picture" => "https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg",
    "name" => "Makieeee",
    "update" => "CSS God"
]
];

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body{
            font-family: Helvetica;
        }

        article{
            display: flex;
        }

        article h3{
            margin-top: 0;
            padding-top: 0;
            margin-bottom: 0.4em;
        }

        article{
            padding-bottom: 1em;
        }

        article img{
            width: 60px;
            padding-right: 1em;
        }
    </style>
</head>
<body>

<section class="timeline">
    <?php foreach( $posts as $post ): ?>
        <article>
            <div>
                <img src="<?php echo $post['picture'] ?>" alt="<?php echo $post['name'] ?>">
            </div>

            <div>
                <h3><?php echo $post['name'] ?></h3>
                <div><?php echo $post['update'] ?></div>
            </div>
        </article>
    <?php endforeach; ?>
</section>

</body>
</html>