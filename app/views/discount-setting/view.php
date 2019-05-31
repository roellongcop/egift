<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DiscountSetting */

$this->title = $model->benchmark_amount;
$this->params['breadcrumbs'][] = ['label' => 'Discount Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-setting-view">
 
    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <p>
        <?= Yii::$app->template->updateButton($model); ?> 
        <?= Yii::$app->template->deleteButton($model, 'benchmark_amount'); ?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Merchant Name',
                'value' => $model->user->profile->_name
            ],
            'benchmark_amount',
            'percentage_discount',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
