<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PointManagementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Point Managements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="point-management-index">

    <h2><?= Html::encode($this->title) ?></h2> <hr>   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Yii::$app->template->createButton($this->title); ?> 
     

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'point',
            'benchmark',
            'created_at',
            // 'updated_at',

            Yii::$app->template->actionButtons('point'), 
        ],
    ]); ?>
</div>
