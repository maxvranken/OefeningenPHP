<?php
$producten = [
    ['name' => 'Flappy Bird', 'price' => 4, 'picture' => "https://upload.wikimedia.org/wikipedia/en/0/0a/Flappy_Bird_icon.png"],
    ['name' => 'Flappy Wings', 'price' => 3, 'picture' => "http://flappywings.org/wp-content/themes/twentytwelve/flappy-wings.png"],
    ['name' => 'Flappy Moeder', 'price' => 2, 'picture' => "https://i.ytimg.com/vi/mYzfiBy6wLQ/maxresdefault.jpg"]
];
$id = $_GET['id'];
$product = $producten[$id];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Buy <?php echo $product['name']."for only ".$product['price'] ?></title>
</head>
<body>
<p>
    buy <?php echo $product['name']."for only ".$product['price'] ?>
</p>
</body>
</html>