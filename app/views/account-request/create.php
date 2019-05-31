<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AccountRequest */

$this->title = 'Create Account Request';
$this->params['breadcrumbs'][] = ['label' => 'Account Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="account-request-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
