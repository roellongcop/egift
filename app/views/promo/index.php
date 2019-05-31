<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PromoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Promos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="promo-index">

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
                'attribute' => 'included_egift',
                'format' => 'raw',
                'value' => function($model) {
                    return $model->getIncludedEgifts(true);
                }
            ],

            [
                'attribute' => 'name',
                'value' => '_name'
            ],
            
            'start_at',
            'end_at',

            Yii::$app->template->actionButtons(),   

             
        ],
    ]); ?>
</div>
