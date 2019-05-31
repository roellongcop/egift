<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NatureOfBusiness */

$this->title = $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Nature Of Businesses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nature-of-business-view">

    <h2> <?= $model->_icon . ' ' . Html::encode($this->title) ?></h2><hr> 

    <p>
        <?= Yii::$app->template->updateButton($model); ?> 
        <?= Yii::$app->template->deleteButton($model); ?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_name',
            '_description:ntext',
            '_created_at',
            '_updated_at',
        ],
    ]) ?>

</div>
