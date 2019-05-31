<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Role */

$this->title = 'Update Role: ' . $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="role-update">


    <?= $this->render('_update_form', [
        'model' => $model,
    ]) ?>

</div>
