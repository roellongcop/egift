<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UserSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

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
                    return $model->profile->_name;
                }
            ],
            [
                'attribute' => 'merchant_id',
                'value' => '_name'
            ],
            // 'description:ntext',
            'latitude',
            'longitude',
            [
                'attribute' => 'status',
                'filter' => [0=>'Active', 1=>'Not-active'],
                'format' => 'raw',
                'value' => function($model) {
                    return $model->_status;
                }
            ],
            //'created_at',
            //'updated_at',

            Yii::$app->template->actionButtons('id'), 
           
        ],
    ]); ?>
</div>
