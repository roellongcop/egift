<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h2><?= Html::encode($this->title) ?></h2> <hr >

    <p>
        <?= Yii::$app->template->updateButton($model); ?> 
        <?= Yii::$app->template->deleteButton($model, 'id'); ?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'egift_id',
            'quantity',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
