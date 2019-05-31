<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Yii::$app->template->createButton($this->title); ?> 


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'status',
            'created_at',
            'updated_at',
            'egift_id',
            //'transaction_id',
            //'amount',

            Yii::$app->template->actionButtons('id'),    
        ],
    ]); ?>
</div>
