<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Merchants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h2><?= Html::encode($this->title) ?></h2> <hr>
    <?= Yii::$app->template->createButton($this->title); ?> 
   
    <div class="table-responsive">
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
                    'format' => 'raw',
                    'value' => '_description'
                ],
                'tel_no',
                //'address:ntext',
                //'logo:ntext',
                [
                    'attribute' => 'user_status',
                    'filter' => [
                        0 => 'Un-authorized',
                        1 => 'Authorized',
                        2 => 'Block listed',
                    ],
                    'format' => 'raw',
                    'value' => '_status'
                ],
                //'created_at',
                //'updated_at',

                Yii::$app->template->actionButtons(),    

 
            ],
        ]); ?>
    </div>
</div>
