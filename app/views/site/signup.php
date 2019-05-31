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
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <h1>Register</h1>
                    <p class="text-muted">Create your account</p>
                    <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'username', Yii::$app->template->_form('user'))->textInput([
                            'maxlength' => true, 
                            'placeholder' => 'Username'
                        ]) ?>

                        <?= $form->field($model, 'email', Yii::$app->template->_form('envelope'))->textInput([
                            'maxlength' => true, 
                            'placeholder' => 'Email'
                        ]) ?>

                        <?= $form->field($model, 'password', Yii::$app->template->_form('lock'))->passwordInput([
                            'maxlength' => true, 
                            'placeholder' => 'Password'
                        ]) ?>

                        
                        <?= $form->field($model, 'password_repeat', Yii::$app->template->_form('lock'))->passwordInput([
                            'maxlength' => true, 
                            'placeholder' => 'Repeat Password'
                        ]) ?>
 
                        <?= Html::submitButton('Create Account', ['class' => 'btn btn-block btn-success']) ?>

                    <?php ActiveForm::end(); ?>
                </div>
                <div class="card-footer p-4">
                    <div class="row">
                        <div class="col-6">
                            <?= Html::a('Login to your Account', ['login'], [
                                'class' => 'btn btn-block btn-facebook'
                            ]) ?>
                        </div>
                        <div class="col-6">
                            <?= Html::a('Home', ['/'], [
                                'class' => 'btn btn-block btn-twitter'
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

