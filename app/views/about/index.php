<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AboutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Abouts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= Yii::$app->template->createButton($this->title); ?> 


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'logo:ntext',
            'description:ntext',
            'address:ntext',
            'mission:ntext',
            //'vision:ntext',
            //'history:ntext',
            //'email:email',
            //'contact_no',
            //'facebook',
            //'twitter',
            //'instagram',
            //'yahoo',
            //'status',
            //'created_at',
            //'updated_at',

            Yii::$app->template->actionButtons('description'), 
        ],
    ]); ?>
</div>
