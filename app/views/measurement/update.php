<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Measurement */

$this->title = 'Update Measurement: ' . $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Measurements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="measurement-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
