<?php
$numPage = (is_numeric($get) ? $get - 1 : 0);
$firstNews = ($numPage * 5);

$news = Database::getInstance()->getOrderBy('news', ['DESC', 5, $firstNews])->result();
$count = Database::getInstance()->countTableRow('news')->first();

if (!empty($news) && !empty($count)) {
    $count = reset($count);

    $countButton = ceil($count / 5);
} else {
    include '../includes/error/inDev.php';
    exit();
}

require_once "../views/news.php";
?>