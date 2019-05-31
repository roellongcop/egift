<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Branches */

$this->title = 'Create Branches';
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
