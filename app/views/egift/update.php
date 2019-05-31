<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Egift */

$this->title = 'Update Egift: ' . $model->_description;
$this->params['breadcrumbs'][] = ['label' => 'Egifts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="egift-update">
	<input type="hidden" id="freebies-id" value="<?= $model->id ?>">
    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
