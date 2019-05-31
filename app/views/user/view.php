<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <p>
        <?= Yii::$app->template->updateButton($model); ?> 
        <?= Yii::$app->template->deleteButton($model, 'username'); ?> 
    </p>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
            'password',
            [
                'label' => 'User type',
                'value' => Yii::$app->params['user_type'][$model->user_type]
            ],
            'access_token',
            'auth_key',
            [
                'label' => 'Status',
                'format' => 'raw',
                'value' => Yii::$app->params['user_status'][$model->status]
            ],
            'authorizationLink:raw',
            'role.name',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
