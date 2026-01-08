<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EgiftUser */

$this->title = 'Create Egift User';
$this->params['breadcrumbs'][] = ['label' => 'Egift Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
