<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Promo */

$this->title = $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Promos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-view">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', '#delete', [
            'title' => 'Delete',
            'class' => 'btn btn-danger delete',
            'data-key' => $model->id,
            'data-selected' => $model->_name,
            'data-page' => Yii::$app->controller->id,
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Included Egifts',
                'format' => 'raw',
                'value' => $model->getIncludedEgifts(true)
            ],
            '_name',
            '_description:ntext',
            'start_at',
            'end_at',
            '_status:raw',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
