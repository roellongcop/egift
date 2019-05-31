<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Measurement */

$this->title = 'Create Measurement';
$this->params['breadcrumbs'][] = ['label' => 'Measurements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="measurement-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
