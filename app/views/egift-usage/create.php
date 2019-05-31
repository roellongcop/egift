<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EgiftUsage */

$this->title = 'Create Egift Usage';
$this->params['breadcrumbs'][] = ['label' => 'Egift Usages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-usage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
