<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IconSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Icons';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="icon-index">

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
                'attribute' => 'name',
                'label' => 'Icon',
                'format' => 'raw',
                'value' => '_icon'
            ],
            'name',
            'created_at',
            'updated_at',

            Yii::$app->template->actionButtons(),    
            
        ],
    ]); ?>
</div>
