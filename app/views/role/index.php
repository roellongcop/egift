<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <h2><?= Html::encode($this->title) ?></h2> <hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php if(! Yii::$app->permission->hasGuest()): ?>
        <div class="alert alert-info">
            Seems like <b>Guest</b> account dont have any access.
            <?= Html::a('Click here to create an access to guest', [
                'role/create', 'name' => 'guest'
            ]) ?>
        </div>
    <?php endif; ?>

    
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
            // [
            //     'attribute' => 'access',
            //     'format' => 'raw',
            //     'value' => function($model) {
            //         return Yii::$app->permission->getMyActions(json_decode($model->actions, true));
            //     }
            // ],
 
            // 'created_at',
            // 'updated_at',
            Yii::$app->template->actionButtons(),   
 
        ],
    ]); ?>
</div>
