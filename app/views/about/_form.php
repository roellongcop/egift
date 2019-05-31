<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\About */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="about-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'logo_input', Yii::$app->template->_form('folder'))->fileInput(['class' => 'image-input']) ?>

                <h1><i class="fa fa-spinner"></i></h1>

                <img id="image-preview" src="<?= Yii::$app->template->_image($model->logo) ?>" 
                    alt="" class="img-thumbnail" width="200" height="200">
                </div> 
        </div>
        <div class="row">
            <div class="col-md-12"><br> <br>
                <?= $form->field($model, 'description')->textarea([
                    'class' => 'summernote'
                ]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'address')->textarea([
                    'rows' => 6 
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'mission')->textarea([
                    'rows' => 6 
                ]) ?>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'vision')->textarea([
                    'rows' => 6 
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'history')->textarea([
                    'rows' => 6 
                ]) ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'terms_and_condition')->textarea([
                    'rows' => 6 
                ]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'privacy_policy')->textarea([
                    'rows' => 6 
                ]) ?>
            </div>
        </div>


        <hr>
        <h2>Social Media Accounts</h2> 
        <hr>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'twitter')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'yahoo')->textInput(['maxlength' => true]) ?>
            </div>
        </div>



        <div class="form-group"> <br> <br>
            <?= Html::submitButton('Save Information', ['class' => 'btn btn-success btn-lg']) ?>
        </div>

    

    <?php ActiveForm::end(); ?>

</div>
