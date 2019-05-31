<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Freebies */

$this->title = 'Update Freebies: ' . $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Freebies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="freebies-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
