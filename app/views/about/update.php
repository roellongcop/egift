<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\About */

$this->title = 'Update Our Information';
$this->params['breadcrumbs'][] = ['label' => 'Abouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Our Information', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="about-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
