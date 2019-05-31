<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EgiftFreebiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Egift Freebies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-freebies-index">

    <h2><?= Html::encode($this->title) ?></h2> <hr>   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Yii::$app->template->createButton($this->title); ?> 
     

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-sm table-striped table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'egift_id',
            'freebies_id',
            'qty',
            //'status',
            //'created_at',
            //'updated_at',

            Yii::$app->template->actionButtons('id'),  
            
        ],
    ]); ?>
</div>
