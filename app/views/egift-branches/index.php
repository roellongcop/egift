<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EgiftBranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Egift Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Yii::$app->template->createButton($this->title); ?> 
  

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'egift_id',
            'branch_id',

            Yii::$app->template->actionButtons('id'),  
        ],
    ]); ?>
</div>
