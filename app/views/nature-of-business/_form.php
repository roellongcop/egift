<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\IconSearch;

/* @var $this yii\web\View */
/* @var $model app\models\NatureOfBusiness */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nature-of-business-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'icon_id')->dropDownList(
                IconSearch::dropDown(),
                ['prompt' => 'Select Icon']
            ) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
