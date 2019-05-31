<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Freebies */

$this->title = 'Create Freebies';
$this->params['breadcrumbs'][] = ['label' => 'Freebies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freebies-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
