<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Personnel */

$this->title = $model->_fullname;
$this->params['breadcrumbs'][] = ['label' => 'Personnels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-view">

    <h2>
        <img class="img-circle" width="50" src="<?= Yii::$app->template->_image($model->logo) ?>" alt="">
        <?= Html::encode($this->title) ?>
    </h2> <hr> 


    <p>
        <?= Yii::$app->template->updateButton($model); ?> 
        <?= Yii::$app->template->deleteButton($model, '_fullname'); ?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_fullname',
            '_company_name',
            '_position',
            '_self_description:ntext',
            '_inspiring_message:ntext',
            '_status:raw',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
