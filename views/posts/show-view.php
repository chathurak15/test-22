<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title><?= $post['title']?></title>
</head>
<body>
    <div class="container">
            <div class="card m-1 p-2">
                <h2><?= $post['title']?></h2>
                <a href="/posts/edit/<?= $post['id']?>">Edit</a>
                <p><?= nl2br( $post['content'])?></p>
            </div>
    </div>
</body>
</html>
