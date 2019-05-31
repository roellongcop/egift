<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EgiftBranches */

$this->title = 'Create Egift Branches';
$this->params['breadcrumbs'][] = ['label' => 'Egift Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-branches-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
