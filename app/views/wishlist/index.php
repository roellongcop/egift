<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WishlistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wishlists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wishlist-index">

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
            'status',
            'created_at',
            //'updated_at',

            Yii::$app->template->actionButtons('id'),    

 
        ],
    ]); ?>
</div>
