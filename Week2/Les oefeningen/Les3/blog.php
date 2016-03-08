<?php
$conn = new PDO('mysql:host=localhost; dbname=imd', 'root', '');

$posts = $conn->query("select * from posts");

if( !empty($_POST) ){
    $title = $_POST['title'];
    $post = $_POST['post'];

    $statement = $conn->prepare("insert into posts (title, post) values (:title, :post)");
    $statement->bindParam(":title", $title);
    $statement->bindParam(":post", $post);
    $statement->execute();
}
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
</head>
<body>
<?php while($p = $posts->fetch(PDO::FETCH_ASSOC)): ?>
    <article>
        <h2><?php echo $p['title']; ?></h2>
        <div><?php echo htmlspecialchars($p['post']); ?></div>
    </article>
<?php endwhile; ?>

<form action="" method="post">
    <div>
        <label for="title">Title</label>
        <input type="text" name="title">
    </div>
    <div>
        <label for="post">Post</label>
        <textarea name="post" id="post" cols="30" rows="10"></textarea>
    </div>

    <input type="submit" value="submit">
</form>
</body>
</html>