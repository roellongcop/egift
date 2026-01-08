<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EgiftUsageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Egift Usages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-usage-index">
 
    <h2><?= Html::encode($this->title) ?></h2> <hr>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= Yii::$app->template->createButton($this->title); ?> 

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'egift_id',
            'created_at',
            'status',

            Yii::$app->template->actionButtons('id'),   
        ],
    ]); ?>


    <!-- <div class="chart-wrapper" style="height:300px;margin-top:40px;">
        <canvas class="chart" id="main-chart" height="300"></canvas>
    </div> -->
</div>
