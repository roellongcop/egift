<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Update Profile';
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['/profile']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h2><?= Html::encode($this->title) ?></h2><hr>

    <?= $this->render('_profile_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
