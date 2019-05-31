<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\CategorySearch;
use app\models\UserSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EgiftSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Egifts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Egift', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
                'value' => '_description'
            ],
            'stock',

            [
                'attribute' => 'promo',
                'value' => '_promo',
                'filter' => Yii::$app->params['promo_status'],
            ],

            //'referral_code',
            //'image:ntext',
            //'status',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => 130],
                'buttons' => [
                    'view' => function($url) {
                        return Html::a('<i class="fa fa-th-large"></i>', $url, [
                            'title' => 'View',
                            'class' => 'btn btn-info btn-sm'
                        ]);
                    },
                    'update' => function($url) {
                        return Html::a('<i class="fa fa-edit"></i>', $url, [
                            'title' => 'Update',
                            'class' => 'btn btn-success btn-sm'
                        ]);
                    },
                    'delete' => function($url, $model) {
                        return Html::a('<i class="fa fa-trash"></i>', '#delete', [
                            'title' => 'Delete',
                            'class' => 'btn btn-danger btn-sm delete',
                            'data-key' => $model->id,
                            'data-selected' => $model->_description,
                            'data-page' => Yii::$app->controller->id,
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>
