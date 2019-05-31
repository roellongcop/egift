<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EgiftFreebies */

$this->title = 'Create Egift Freebies';
$this->params['breadcrumbs'][] = ['label' => 'Egift Freebies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-freebies-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
