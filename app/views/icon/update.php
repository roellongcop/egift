<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Icon */

$this->title = 'Update Icon: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Icons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="icon-update">
    <h2><?= $model->_icon . ' ' .  Html::encode($this->title) ?></h2> <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
