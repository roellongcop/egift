<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EgiftUser */

$this->title = 'Update Egift User: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Egift Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="egift-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
