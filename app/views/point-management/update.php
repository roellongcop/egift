<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PointManagement */

$this->title = 'Update Point Management: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Point Managements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="point-management-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr>   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
