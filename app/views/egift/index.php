<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CategorySearch;
use app\models\UserSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EgiftSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Egifts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-index">

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
                'attribute' => 'merchant_id',
                'filter' => UserSearch::lists(),
                'value' => function($model) {
                    return $model->merchant->profile->_name;
                }
            ],

            [
                'attribute' => 'name',
                'value' => '_name'
            ],


            [
                'attribute' => 'description',
                'value' => '_description'
            ],

 

            'stock',


            [
                'attribute' => 'promo',
                'value' => '_promo',
                'filter' => Yii::$app->params['promo_status'],
            ],

            //'image:ntext',
            //'status',
            //'created_at',
            //'updated_at',

            Yii::$app->template->actionButtons('description'), 
             
        ],
    ]); ?>
</div>
