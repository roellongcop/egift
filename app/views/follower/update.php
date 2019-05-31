<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Follower */

$this->title = 'Update Follower: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Followers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="follower-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr>   
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
