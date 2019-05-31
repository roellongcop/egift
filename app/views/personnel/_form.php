<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Personnel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personnel-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            
            <div class="col-md-6">
                <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'logo_input', Yii::$app->template->_form('folder'))->fileInput(['class' => 'image-input']) ?>

                <h1><i class="fa fa-spinner"></i></h1>

                <img id="image-preview" src="<?= Yii::$app->template->_image($model->logo) ?>" 
                    alt="" class="img-thumbnail" width="200" height="200">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'inspiring_message')->textarea(['rows' => 9]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'self_description')->textarea(['rows' => 9]) ?>
            </div>
        </div>
        

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
