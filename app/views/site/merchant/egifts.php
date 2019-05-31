 

<?php
use yii\helpers\Html;
use yii\widgets\ListView;
$this->title = $model->profile->_name. ' | Egifts';
$this->params['page'] = 'merchant_list';
?>


<!-- Heading -->
<div id="heading" style="background-image: linear-gradient(rgba(206, 27, 27, 0.61), rgba(16, 228, 187, 0.66)), url(<?= Yii::$app->template->_image('uploads/images/bg-2.jpeg') ?>">
    <h1><?= $model->profile->_name ?></h1>
</div>



<section id="main" class="wrapper">
    <div class="inner">

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '/site/egifts/_details',
             'pager' => [
                'options' => [
                    'tag' => 'div',
                    'class' => 'pager-wrapper',
                    'id' => 'pager-container',
                ],
            ]
        ]) ?>

    </div>
</section>