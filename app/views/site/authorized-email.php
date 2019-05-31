<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;

$this->title = 'Authorization Email';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <h1>Authorization Email</h1>
                        <p class="text-muted">Click the button below for completing registration</p>
                    </div>
                    <div class="card-footer p-4">
                        <?= Html::a( $auth_key , ['site/authorization', 'auth_key' => $auth_key]) ?>
                    </div>
                </div>
        </div>
        
    </div>
</div>

