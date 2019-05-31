<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Frequently Ask Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">

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
                'attribute' => 'question',
                'value' => '_question'
            ],

            [
                'attribute' => 'answer',
                'value' => '_answer'
            ],
            'created_at',
            //'updated_at',

            Yii::$app->template->actionButtons('question'),   
            
        ],
    ]); ?>
</div>
