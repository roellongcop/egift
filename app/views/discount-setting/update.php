<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DiscountSetting */

$this->title = 'Update Discount Setting: ' . $model->benchmark_amount;
$this->params['breadcrumbs'][] = ['label' => 'Discount Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="discount-setting-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr>

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
