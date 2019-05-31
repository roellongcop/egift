<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personnel */

$this->title = 'Update Personnel: ' . $model->_fullname;
$this->params['breadcrumbs'][] = ['label' => 'Personnels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_fullname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personnel-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
