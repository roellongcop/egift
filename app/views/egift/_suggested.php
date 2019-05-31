<?php 
use yii\helpers\Html;
$limit = 4; 
?>

<aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">Suggested Egifts</h3>

    <?php foreach ($model as $egift) : ?>

        <?php if($limit > 0): ?>
            <div class="media post_item">
                <img width="100" height="70" src="<?= Yii::$app->template->_image($egift->image) ?>" alt="post">
                <div class="media-body">
                    <?= Html::a(' <h3>'.$egift->_description.'</h3>', ['egift/details', 'id' => $egift->id]) ?>
                    <p>₱ </p>
                </div>
            </div> 
            <?php $limit--; ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <div class="br"></div>
</aside>