<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$asset = AppAsset::register($this);

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <!-- <h1>Login</h1> -->
                        <div class="text-center">
                        <?= Html::a('<img class="navbar-brand-full" src="'. Yii::$app->template->getLogo().'" width="200" alt="CoreUI Logo">', ['/']) ?>
                        </div>
                        

                        <p class="text-muted">Sign In to your account</p>
                        <?php $form = ActiveForm::begin(); ?>
                            <?= $form->field($model, 'username', [
                                'template' => '
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-user"></i>
                                            </span>
                                        </div>
                                        {input}
                                    </div>
                                    {error}
                                '
                            ])->textInput([
                                'maxlength' => true, 
                                'placeholder' => 'Username'
                            ]) ?>
                            <?= $form->field($model, 'password', [
                                'template' => '
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="icon-lock"></i>
                                            </span>
                                        </div>
                                        {input}
                                    </div>
                                    {error}
                                '
                            ])->passwordInput([
                                'maxlength' => true, 
                                'placeholder' => 'Password'
                            ]) ?>

                            <?= $form->field($model, 'rememberMe')->checkbox() ?>

                            <div class="row">
                                <div class="col-6">
                                    <?= Html::submitButton('Login', [
                                        'class' => 'btn btn-primary px-4'
                                    ]) ?>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                </div>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
               <!--  <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>Sign up</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <?= Html::a('Register Now!', ['signup'], [
                                'class' => 'btn btn-primary active mt-3'
                            ]) ?>
                        </div>
                    </div>
                </div>  -->
            </div>
        </div>
    </div>
</div>
