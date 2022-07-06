<?php
$news = Database::getInstance()->getWhere('news',['id','=',$get]);

if (!$news->error()){
    $news = $news->first();
}else{
    include '../includes/error/inDev.php';
    exit();
}

include "../views/view.php"
?>