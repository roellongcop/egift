<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Supplier */

$this->title = $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Suppliers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-view">

    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', '#delete', [
            'title' => 'Delete',
            'class' => 'btn btn-danger delete',
            'data-key' => $model->id,
            'data-selected' => $model->_name,
            'data-page' => Yii::$app->controller->id,
        ]); ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_name',
            '_description:ntext',
            '_address:ntext',
            'contact_no',
            '_created_at',
            '_updated_at',
        ],
    ]) ?>

</div>
