<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AccountRequest */

$this->title = 'Update Account Request: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Account Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="account-request-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
