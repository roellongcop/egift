<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name', Yii::$app->template->_form('user'))->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'description', Yii::$app->template->_form('docs'))->textarea([
                    'rows' => 6, 
                ]) ?>

                <?= $form->field($model, 'tel_no', Yii::$app->template->_form('phone'))->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'address', Yii::$app->template->_form('location-pin'))->textarea(['rows' => 6]) ?>

            </div>
            <div class="col-md-6">
                <?= $form->field($user, 'email', Yii::$app->template->_form('envelope'))->textInput(['maxlength' => true]) ?>


                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'logo_input')->fileInput(['class' => 'image-input']) ?>

                        
                        <h1><i class="fa fa-spinner"></i></h1>


                        <img 
                            id="image-preview" 
                            src="<?= Yii::$app->template->_image($model->logo) ?>" 
                            alt="" 
                            class="img-thumbnail" 
                            width="200"
                             height="200">
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'logo_banner_input')->fileInput(['class' => 'image-input']) ?>

                        
                        <h1><i class="fa fa-spinner"></i></h1>


                        <img 
                            id="image-preview-banner" 
                            src="<?= Yii::$app->template->_image($model->logo_banner) ?>" 
                            alt="" 
                            class="img-thumbnail" 
                            width="200"
                            height="200">
                    </div>
                </div>
                
                
            </div>
        </div>


       

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
