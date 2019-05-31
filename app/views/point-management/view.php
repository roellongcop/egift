<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PointManagement */

$this->title =  ($model->point == 1) ? $model->point . ' point': $model->point. ' points'; 
$this->params['breadcrumbs'][] = ['label' => 'Point Managements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="point-management-view">

    <h2><?= Html::encode($this->title) ?></h2> <hr>   

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'point',
            'benchmark',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
