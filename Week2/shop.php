<?php
$producten = array(
    array('name' => 'Flappy Bird',
        'price' => 4.99,
        'picture' => 'School', ),

    array('name' => 'Lare Croft',
        'price' => 6.99,
        'picture' => 'Sport', ),

    array('name' => 'Shlaang',
        'price' => 0.99,
        'picture' => 'Ontspanning', ),
); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>de webshoep</title>
</head>
<body>
<section>
    <?php foreach ($producten as $key => $p):?>
        <article class="">
            <a href="shop_details.php?id= <?php echo $key; ?>">
                <?php echo $p['name']; ?>
            </a>

        </article>
    <?php endforeach; ?>
</section>

</body>
</html>