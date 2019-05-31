<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EgiftFreebies */

$this->title = 'Update Egift Freebies';
$this->params['breadcrumbs'][] = ['label' => 'Egift Freebies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="egift-freebies-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr>   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
