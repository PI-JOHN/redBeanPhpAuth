<?php require_once __DIR__.'/../libs/rb.php'; ?>
<?php require_once __DIR__.'/../App/Db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <?php
    $data = $_GET['id'];

    $article = R::findOne('news', 'id = ?', array($data));
    //var_dump($article['title']);
    $title = $article['title'];
    require_once __DIR__.'/head.php';

    ?>
</head>
<body>

<?php require_once __DIR__.'/header.php'; ?>

<div id="wrapper">
    <div id="leftCol">
        <?php

                echo "<div id=\"bigArticle\">";
            echo '<img src="/../img/articles/'.$article["id"] .'.jpg" alt="Статья '.$article["id"] .'" titile="Статья '.$article["id"] .'">
                    <h2>'.$article["title"] .'</h2>
                    <p>'.$article["full_text"] .'</p>
                    <a href="/"><div class="back">Назад</div></a>
                </div>';
         ?>

    </div>
    <?php require_once __DIR__.'/rightCol.php'; ?>
</div>

<?php
require_once __DIR__ . '/footer.php';
?>
