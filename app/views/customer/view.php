<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Merchants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">
 
   <h2>
        <img src=" <?= Yii::$app->template->_image($model->logo) ?>" class="img-profile">
        <?= Html::encode($this->title) ?>
        

        <?php if($model->user->status == 0 || $model->user->status == 1): ?>
            <?= Html::a('Add to Block list', ['customer/add-to-blocklist', 'user_id' => $model->user_id], [
                'class' => 'pull-right btn btn-danger'
            ]) ?>
        <?php else: ?>
            <?= Html::a('Authorized', ['customer/set-to-authorized', 'user_id' => $model->user_id], [
                'class' => 'pull-right btn btn-primary'
            ]) ?>

            <?= Html::a('Un-Authorized', ['customer/set-to-unauthorized', 'user_id' => $model->user_id], [
                'class' => 'pull-right btn btn-warning'
            ]) ?>
        <?php endif; ?>


    </h2>
    <hr>


    <p>
        <?php if(Yii::$app->permission->canUpdate()) : ?>
            <?= Html::a('Update Basic Information', ['update', 'id' => $model->id], [
                'class' => 'btn btn-primary btn-sm'
            ]) ?>
        <?php endif; ?>
    </p>

    
    <div class="table-responsive">
        
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                '_name',
                '_description:raw',
                'allowed_egifts',
                'tel_no',
                '_address',
                '_updated', 
                '_registrationLink:raw', 
            ],
        ]) ?>
    </div>

    <hr>
    <h2>Credentials</h2>
    <hr>


    <div class="table-responsive">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'user.username',
                'user.email:email',
                'user.password',
                'user.access_token',
                'user.auth_key',
                ['label' => 'User Type', 'value' => $model->user->_user_type],
                'user._status:raw',
                'user._created',
                'user._updated',
            ],
        ]) ?>

    </div>
</div>
