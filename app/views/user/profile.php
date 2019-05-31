<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Profile Information';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h2>
        <img src=" <?= Yii::$app->template->_image() ?>" class="img-profile">
        <?= Html::encode($this->title) ?>
    </h2>
    <hr>

    <?php if (Yii::$app->permission->checkAccess('update-profile')) : ?>
        <p>
            <?= Html::a('Update Basic Information', ['update-profile'], [
                'class' => 'btn btn-primary btn-sm'
            ]) ?>
        </p>
    <?php endif; ?>

    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            '_name',
            '_description',
            'tel_no',
            '_address',
            '_updated',
        ],
    ]) ?>

    <br>
    <h2>Credentials</h2>
    <hr>

    <?php if (Yii::$app->permission->checkAccess('credential')) : ?>
        <p>
            <?= Html::a('Update Credentials', ['credential'], [
                'class' => 'btn btn-primary btn-sm'
            ]) ?>
        </p>
    <?php endif; ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user.username',
            'user.email:email',
            'user.password',
            'user.access_token',
            'user.auth_key',
            'user._user_type',
            'user._status:raw',
            'user._created',
            'user._updated',
        ],
    ]) ?>

</div>
