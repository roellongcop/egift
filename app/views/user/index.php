<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\RoleSearch; 

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Yii::$app->template->createButton($this->title); ?> 
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-sm table-striped table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'email:email',
            [
                'attribute' => 'user_type',
                'filter' => Yii::$app->params['user_type'],
                'value' => function($model) {
                    return Yii::$app->params['user_type'][$model->user_type];
                }
            ],

           

            [
                'attribute' => 'status',
                'filter' => [0 => 'Un-authorized', 1 => 'Authorized'],
                'format' => 'raw',
                'value' => function($model) {
                    return Yii::$app->params['user_status'][$model->status];
                }
            ],

            [
                'attribute' => 'role_id',
                'filter' => RoleSearch::lists(),
                'value' => 'role._name'
            ],
            //'access_token',
            //'auth_key',
            //'status',
            //'created_at',
            //'updated_at',

            Yii::$app->template->actionButtons('username'),    

 
        ],
    ]); ?>
</div>
