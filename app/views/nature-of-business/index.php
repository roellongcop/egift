<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NatureOfBusinessSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nature Of Businesses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nature-of-business-index">

    <h2><?= Html::encode($this->title) ?></h2> <hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Yii::$app->template->createButton($this->title); ?> 
    

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => ['class' => 'table table-sm table-striped table-bordered'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'merchant_name',
                ],

                [
                    'attribute' => 'name',
                    'value' => '_name'
                ],

                [
                    'attribute' => 'description',
                    'value' => '_description'
                ],
                //'updated_at',

                Yii::$app->template->actionButtons(),    

                
            ],
        ]); ?>
    </div>
</div>
