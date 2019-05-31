<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Icon */

$this->title = 'Create Icon';
$this->params['breadcrumbs'][] = ['label' => 'Icons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="icon-create">
    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
