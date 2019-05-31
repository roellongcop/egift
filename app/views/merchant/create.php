<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = 'Create Merchant';
$this->params['breadcrumbs'][] = ['label' => 'Merchants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-create">

    <h2><?= Html::encode($this->title) ?></h2>
    <hr class="clearfix">

    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
