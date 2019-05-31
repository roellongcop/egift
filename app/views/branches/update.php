<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Branches */

$this->title = 'Update Branches: ' . $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="branches-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
