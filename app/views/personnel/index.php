<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonnelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personnels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-index">

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
                'attribute' => 'fullname',
                'value' => '_fullname'
            ],
            [
                'attribute' => 'company_name',
                'value' => '_company_name'
            ],
            [
                'attribute' => 'position',
                'value' => '_position'
            ],
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => '_status'
            ],

            Yii::$app->template->actionButtons('fullname'),   

         
        ],
    ]); ?>
</div>
