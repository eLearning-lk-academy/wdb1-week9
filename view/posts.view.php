<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <div>
        <a href="<?= $GLOBALS['site_url'] ?>/add" class="btn btn-primary">Add Post</a>
        <?php foreach ($posts as $post): ?>
            <div>
                <h1>
                    <?php echo $post['title']; ?>
                </h1>
                <p>
                    <?php echo $post['post']; ?>
                </p>
                <div>
                    <a href="<?= $GLOBALS['site_url'] ?>/edit/<?php echo $post['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="<?= $GLOBALS['site_url'] ?>/delete/<?php echo $post['id']; ?>" class="btn btn-danger">Delete</a>

                </div>
            </div>
                
                <hr>
        <?php endforeach; ?>
    </div>
</body>

</html>