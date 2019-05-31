<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PriceVariety */

$this->title = 'Update Price Variety';
$this->params['breadcrumbs'][] = ['label' => 'Price Varieties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="price-variety-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr>   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
