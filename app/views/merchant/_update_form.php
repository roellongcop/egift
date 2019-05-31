<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\NatureOfBusinessSearch;
use app\models\RoleSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-5">

              
                <?= $form->field($model, 'name', Yii::$app->template->_form('user'))->textInput(['maxlength' => true]) ?>
                

                <?= $form->field($model, 'tel_no', Yii::$app->template->_form('phone'))->textInput(['maxlength' => true]) ?>

                <?= $form->field($user, 'email', Yii::$app->template->_form('envelope'))->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'allowed_egifts', Yii::$app->template->_form('equalizer'))->textInput(['maxlength' => true]) ?>
 

                <?= $form->field($model, 'authorized')->checkbox() ?>



                <?= $form->field($model, 'logo_input', Yii::$app->template->_form('folder'))->fileInput(['class' => 'image-input']) ?>
                <h1><i class="fa fa-spinner"></i></h1>
                <img id="image-preview" src="<?= Yii::$app->template->_image($model->logo) ?>" alt="" class="img-thumbnail" width="200" height="200">
                



            </div>
            <div class="col-md-7">
                <?= $form->field($model, 'description', Yii::$app->template->_form('location-pin'))->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'address', Yii::$app->template->_form('location-pin'))->textarea(['rows' => 6]) ?>
            </div>
        </div>

 
        <div class="form-group"> <br>
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
