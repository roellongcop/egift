<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Update Credentials';
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['/profile']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-update">

    <h2><?= Html::encode($this->title) ?></h2>
    <hr>

    <?= $this->render('_credential_form', [
        'model' => $model,
    ]) ?>

</div>
