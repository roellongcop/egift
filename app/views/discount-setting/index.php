<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UserSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiscountSettingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Discount Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-setting-index">

    <h2><?= Html::encode($this->title) ?></h2> <hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Yii::$app->template->createButton($this->title); ?> 


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'merchant_id',
                'filter' => UserSearch::lists(),
                'value' => function($model) {
                    return $model->user->profile->_name;
                }
            ],
            'benchmark_amount',
            'percentage_discount',
            //'created_at',
            //'updated_at',

            Yii::$app->template->actionButtons('benchmark_amount')
        ],
    ]); ?>
</div>
