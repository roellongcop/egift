<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PriceVariety */

$this->title = 'Create Price Variety';
$this->params['breadcrumbs'][] = ['label' => 'Price Varieties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-variety-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr>   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
