<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PriceVariety */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="price-variety-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'egift_id')->textInput() ?>

    <?= $form->field($model, 'orig_price')->textInput() ?>

    <?= $form->field($model, 'sale_price')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
