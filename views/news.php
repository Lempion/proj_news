<div class="newsContainer">
    <div class="newsWrapper">
        <div><h1 class="newsH1">Новости</h1></div>

        <hr class="newsHr">

        <div>
            <?php foreach ($news as $key => $dataNews): ?>
                <div class="nw">
                    <div class="nw-date">
                        <p class="nw-date-p"><?php echo date('d.m.Y', $dataNews->idate); ?></p>
                        <a href="/view/<?php echo $dataNews->id; ?>"><?php echo $dataNews->title; ?></a>
                    </div>
                    <div class="nw-announce">
                        <p class="nw-announce-p"><?php echo $dataNews->announce; ?></p>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>

        <hr class="newsHr">

        <div>
            <?php for ($i = 0; $i < $countButton; $i++): $currentI = $i + 1; ?>
                <button class="newsBtn <?php if (($get && $get == $i + 1) || (!$get && $i == 0)) {
                    $activeBtn = true;
                    echo 'active-btn';
                } ?>">
                    <a class="newsBtn-a <?php if (isset($activeBtn) && $activeBtn === true) {
                        $activeBtn = null;
                        echo 'active-a';
                    } ?>"
                       href="/<?php echo $currentI; ?>"><?php echo $currentI; ?></a></button>
            <?php endfor; ?>
        </div>
    </div>

</div>



