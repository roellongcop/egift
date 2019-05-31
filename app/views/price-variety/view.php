<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PriceVariety */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Price Varieties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-variety-view">

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
            'egift_id',
            'orig_price',
            'sale_price',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
