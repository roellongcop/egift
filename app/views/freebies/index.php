<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CategorySearch;
use app\models\SupplierSearch;
use app\models\MeasurementSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FreebiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Freebies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freebies-index">

    <h2><?= Html::encode($this->title) ?></h2> <hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Yii::$app->template->createButton($this->title); ?> 
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-sm table-striped table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'value' => '_name'
            ],

            [
                'attribute' => 'description',
                'value' => '_description'
            ],
            // [
            //     'attribute' => 'category_id',
            //     'filter' => CategorySearch::dropDown(),
            //     'value' => 'category._name'
            // ],
            // [
            //     'attribute' => 'supplier_id',
            //     'filter' => SupplierSearch::dropDown(),
            //     'value' => 'supplier._name'
            // ],
            // [
            //     'attribute' => 'unit_id',
            //     'filter' => MeasurementSearch::dropDown(),
            //     'value' => 'measurement._name'
            // ],
            // [
            //     'attribute' => 'price',
            //     'value' => '_price'
            // ],

            // 'qty',

            Yii::$app->template->actionButtons(),    
           
        ],
    ]); ?>
</div>
