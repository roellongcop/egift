<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10"> <br>
            <?php $form = ActiveForm::begin(); ?> 

                <div class="card mx-4">
                    <div class="card-body p-4">
                        <h2>Authorization</h2>
                        <p class="text-muted">
                            Fill up all needed information. (<?= $user->email ?>)
                        </p>
                        
                        <?= $form->field($model, 'name', Yii::$app->template->_form('user'))->textInput([
                            'maxlength' => true, 
                            'placeholder' => 'Company Name'
                        ]) ?>

                      
                        
                        <?= $form->field($model, 'description', Yii::$app->template->_form('location-pin'))->textArea([
                            'placeholder' => 'Company Description',
                            'rows' => 5
                        ]) ?>

                        <?= $form->field($model, 'tel_no', Yii::$app->template->_form('phone'))->textInput([
                            'maxlength' => true, 
                            'placeholder' => 'Telephone No.'
                        ]) ?>

                        
                        <?= $form->field($model, 'address', Yii::$app->template->_form('location-pin'))->textArea([
                            'placeholder' => 'Address',
                            'rows' => 5
                        ]) ?>

                        <?= $form->field($model, 'logo_input', Yii::$app->template->_form('folder'))->fileInput(['class' => 'image-input']) ?>

                        <div class="row">
                            <div class="col-md-4">
                                <img id="image-preview" src="<?= Yii::$app->template->_image($model->logo) ?>" alt="" class="img-thumbnail" width="200" height="200">
                            </div>
                        </div>

                        <br>

                        <hr>

                        <?= $form->field($model, 'logo_banner_input')->fileInput(['class' => 'image-input']) ?>
                        <h1><i class="fa fa-spinner"></i></h1>
                        <div class="row">
                            <div class="col-md-4">
                                <img 
                                    id="image-preview-banner" 
                                    src="<?= Yii::$app->template->_image($model->logo_banner) ?>" 
                                    alt="" 
                                    class="img-thumbnail" 
                                    width="200"
                                    height="200">
                            </div>
                        </div>

                        <br>
                        <hr>

                        <h2>Account Information</h2>
                        <p class="text-muted">
                            Fill up all credential information. (<?= $user->email ?>)
                        </p>


                         <?= $form->field($user, 'username', Yii::$app->template->_form('user'))->textInput([
                            'maxlength' => true, 
                            'placeholder' => 'Username'
                        ]) ?>

                        <?= $form->field($user, 'email', Yii::$app->template->_form('envelope'))->textInput([
                            'maxlength' => true, 
                            'placeholder' => 'Email'
                        ]) ?>

                        <?= $form->field($user, 'password', Yii::$app->template->_form('lock'))->passwordInput([
                            'maxlength' => true, 
                            'placeholder' => 'Password'
                        ]) ?>

                        
                        <?= $form->field($user, 'password_repeat', Yii::$app->template->_form('lock'))->passwordInput([
                            'maxlength' => true, 
                            'placeholder' => 'Repeat Password'
                        ]) ?>


                    </div>
                    <div class="card-footer p-4">
                        <?= Html::submitButton('Confirm Account', ['class' => 'btn btn-block btn-success']) ?>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        
    </div>
</div>

