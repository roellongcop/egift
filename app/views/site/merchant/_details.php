
<?php 
use yii\helpers\Html;
use yii\helpers\Url;
?>

<section class="enlarge merchant-panel" data-id="<?= Url::to(['site/merchant', 'id' => $model->id]) ?>">
    <div class="content">
        <div class="image">
            <img class="merchant-img" src="<?= Yii::$app->template->_image($model->profile->logo) ?>" alt="" />
        </div>
        <header>
            <a href="#" class="icon">
                <span class="label"><?= $model->profile->_name ?></span>
            </a>
            <h3><?= $model->profile->_name ?></h3>
        </header>
        <p><?= $model->profile->_description ?></p>
        <?= Html::a('Read More', ['site/merchant', 'id' => $model->id]) ?>
    </div>
</section>