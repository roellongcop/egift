<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Role */

$this->title = 'Create Role';
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-create">

    <?php # $this->render('_add_form', ['model' => $model]) ?>

    <?= $this->render('_create_form', ['model' => $model]) ?>

</div>
