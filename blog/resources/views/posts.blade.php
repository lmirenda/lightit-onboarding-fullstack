<!doctype html>

<title>My blog</title>
<link rel="stylesheet" href="/app.css">

<body>

    <?php foreach ($posts as $post) : ?>
        <article>
            
            <h1>
                <a href="/posts/<?= $post->slug;?>">
                    <?= $post->title; ?>
                </a>
            </h1>
            
            <?= $post->body; ?>
            
        </article>
    <?php endforeach; ?>

    <script src="app.js"></script>
</body>