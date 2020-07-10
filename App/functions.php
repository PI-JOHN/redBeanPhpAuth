<?php

require_once __DIR__.'/Db.php';

function getNews ($limit)
{
    $db = Db::connection();
    $result = $db->query("SELECT * FROM news ORDER BY id DESC LIMIT $limit");
    $news = array();
    $i = 0;
    while($row = $result->fetch()){
        $news[$i]['id'] = $row['id'];
        $news[$i]['title'] = $row['title'];
        $news[$i]['intro_text'] = $row['intro_text'];
        $news[$i]['full_text'] = $row['full_text'];
        $i++;
    }
    return $news;

}

function getArticle($id)
{
    $idNum = intval($id);
    $db = Db::connection();
    $result = $db->query("SELECT * FROM news WHERE id = $idNum");
    return $result->fetch(PDO::FETCH_ASSOC);
}
