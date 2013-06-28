<article class="grid_10 prefix_1">
    <h2 class="h2 ind1">Наши работы</h2>

    <div class="proj_box">
        <?php foreach($models as $model): ?>
            <div class="project">
                <?php
                    if(isset($model->image->thumbnail)){
                        $thumb = $model->image->thumbnail;
                    }
                    else {
                        $thumb ='';
                    }
                        ?>
                <a href="<?php echo $model->url ?>" class="img_wrap"><img src="<?php echo $thumb; ?>" width="150" alt=""></a>
                <a href="<?php echo $model->url ?>"> <?php echo $model->title; ?></a><br />
                <?php echo $model->description; ?>
            </div>
            <div class="clear"></div>
        <?php endforeach; ?>
    </div>
</article>