<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NatureOfBusiness */

$this->title = 'Create Nature Of Business';
$this->params['breadcrumbs'][] = ['label' => 'Nature Of Businesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nature-of-business-create">

    <h2><?= Html::encode($this->title) ?></h2><hr> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
