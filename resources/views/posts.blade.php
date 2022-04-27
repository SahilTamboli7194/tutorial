<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <?php foreach($posts as $post): ?>
        <article>
           <a href="post/<?= $post->slug;?>">
           <h1>
              <?= $post->title;?>
           </h1>          
        </a> 
        <?= $post->excerpt;?>
        </article>  
    <?php endforeach?>
</body>
</html>