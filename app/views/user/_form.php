<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RoleSearch;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


            <?= $form->field($model, 'role_id')->dropDownList(RoleSearch::lists()) ?>


            <?php if( ! $model->isNewRecord): ?>
                <?= $form->field($model, 'status')->dropDownList([
                    0 => 'Un-authorized',
                    1 => 'Authorized'
                ], ['prompt' => 'Select Status']) ?>
            <?php endif; ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
