<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Branches */

$this->title = $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Branches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-view">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 

    <p>
        <?= Yii::$app->template->updateButton($model); ?> 
        <?= Yii::$app->template->deleteButton($model); ?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'profile._name',
            'name',
            '_description:ntext',
            'latitude',
            'longitude',
            '_status:raw',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
