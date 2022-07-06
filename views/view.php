<div class="newsContainer">
    <div class="newsWrapper">
        <div><h1 class="newsH1"><?php echo $news->title; ?></h1></div>

        <hr class="newsHr">

        <div>

            <div class="nw">
                <div>
                    <p><?php echo $news->content; ?></p>
                </div>
            </div>

        </div>

        <hr class="newsHr">

        <div>
            <a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Все новости>></a>
        </div>
    </div>

</div>
