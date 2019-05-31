<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Role */

$this->title = $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-view">


    <p>
        <?= Yii::$app->template->updateButton($model); ?> 
        <?= Yii::$app->template->deleteButton($model); ?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'label' => 'Access',
                'format' => 'raw',
                'value' => function($model) {
                    return Yii::$app->permission->getMyActions(json_decode($model->actions, true));
                    // return Yii::$app->permission->getModules(json_decode($model->actions, true));
                }
            ],

            [
                'label' => 'Navigation',
                'format' => 'raw',
                'value' => function($model) {
                    return Yii::$app->permission->getMyNavigation(json_decode($model->navigation, true));
                    // return Yii::$app->permission->getModules(json_decode($model->actions, true));
                }
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
