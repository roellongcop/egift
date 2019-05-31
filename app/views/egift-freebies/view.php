<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EgiftFreebies */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Egift Freebies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-freebies-view">

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
            'id',
            'user_id',
            'egift_id',
            'freebies_id',
            'qty',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
