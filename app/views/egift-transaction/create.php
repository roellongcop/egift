<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EgiftTransaction */

$this->title = 'Create Egift Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Egift Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
