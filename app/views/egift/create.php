<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Egift */

$this->title = 'Create Egift';
$this->params['breadcrumbs'][] = ['label' => 'Egifts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <?= $this->render('_form', [
        'price_variety' => $price_variety,
        'model' => $model,
    ]) ?>

</div>
