<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DiscountSetting */

$this->title = 'Create Discount Setting';
$this->params['breadcrumbs'][] = ['label' => 'Discount Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-setting-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
