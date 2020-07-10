<?php require_once __DIR__.'/libs/rb.php'; ?>
<?php require_once __DIR__.'/App/Db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <?php
    $title = "Новости обо всем";
    require_once __DIR__.'/templates/head.php';

    $news = R::findAll('news', 'ORDER BY id DESC LIMIT 3');
    echo '<pre>';
    //var_dump($news[2]['id']);
    echo '</pre>';
    ?>

    <?php if (isset($_SESSION['logged_user'])):?>
        Авторизован!<br>
    Привет <?php echo $_SESSION['logged_user']->login; ?>
    <?php endif; ?>
    <hr>

</head>
<body>

<?php require_once __DIR__.'/templates/header.php'; ?>

        <div id="wrapper">
            <div id="leftCol">
                <?php for ($i = 1; $i <= count($news); $i++){
                    if ($i == 1)
                        echo "<div id=\"bigArticle\">";
                    else
                        echo "<div class=\"article\">";

                    echo '<img src="/img/articles/'.$news[$i]["id"] .'.jpg" alt="Статья '.$news[$i]["id"] .'" titile="Статья '.$news[$i]["id"] .'">
                    <h2>'.$news[$i]["title"] .'</h2>
                    <p>'.$news[$i]["intro_text"] .'</p>
                    <a href="/templates/article.php?id='.$news[$i]->id.'"><div class="more">Далее</div></a>
                </div>';
                    if ($i == 1)
                        echo "<div class=\"clear\"><br></div>";

                } ?>

            </div>
            <?php require_once __DIR__.'/templates/rightCol.php'; ?>
        </div>


<?php require_once __DIR__.'/templates/footer.php'; ?>
</body>
</html>
