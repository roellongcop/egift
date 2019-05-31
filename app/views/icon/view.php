<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Icon */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Icons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="icon-view">

    <h2><?= $model->_icon . ' ' .  Html::encode($this->title) ?></h2> <hr>

    <p>
        <?= Yii::$app->template->updateButton($model); ?> 
        <?= Yii::$app->template->deleteButton($model); ?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
