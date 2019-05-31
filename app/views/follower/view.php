<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Follower */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Followers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="follower-view">

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
            'merchant_id',
            'user_id',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
