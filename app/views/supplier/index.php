<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Suppliers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-index">

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
            [
                'attribute' => 'address',
                'value' => '_address'
            ], 
            'contact_no',
            //'status',
            //'created_at',
            //'updated_at',

            Yii::$app->template->actionButtons(),    
             
        ],
    ]); ?>
</div>
