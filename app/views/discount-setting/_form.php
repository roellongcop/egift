<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UserSearch;

/* @var $this yii\web\View */
/* @var $model app\models\DiscountSetting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="discount-setting-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <?php if(Yii::$app->user->identity->user_type == 9): ?>
                    <?= $form->field($model, 'merchant_id')->dropDownList(
                        UserSearch::lists(), ['prompt' => 'Select Merchant']
                    ) ?>
                <?php endif; ?>

                <?= $form->field($model, 'benchmark_amount')->textInput() ?>

                <?= $form->field($model, 'percentage_discount')->textInput() ?>


                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
