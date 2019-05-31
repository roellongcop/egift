<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Update Merchant: ' . $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Merchants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-update">
    <h2>
        <?= Html::encode($this->title) ?>
        <?php if($model->user->status == 0 || $model->user->status == 1): ?>
            <?= Html::a('Add to Block list', ['merchant/add-to-blocklist', 'user_id' => $model->user_id], [
                'class' => 'pull-right btn btn-danger'
            ]) ?>
        <?php else: ?>
            <?= Html::a('Authorized', ['merchant/set-to-authorized', 'user_id' => $model->user_id], [
                'class' => 'pull-right btn btn-primary'
            ]) ?>

            <?= Html::a('Un-Authorized', ['merchant/set-to-unauthorized', 'user_id' => $model->user_id], [
                'class' => 'pull-right btn btn-warning'
            ]) ?>
        <?php endif; ?>
    </h2>

    <hr class="clearfix">

    <?= $this->render('_update_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
