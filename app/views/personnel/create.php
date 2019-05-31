<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Personnel */

$this->title = 'Create Personnel';
$this->params['breadcrumbs'][] = ['label' => 'Personnels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
