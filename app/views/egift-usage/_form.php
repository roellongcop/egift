<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EgiftUsage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="egift-usage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'egift_id')->textInput() ?>

    <?= $form->field($model, 'date_used')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
