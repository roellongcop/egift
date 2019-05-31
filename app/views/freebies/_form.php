<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CategorySearch;
use app\models\SupplierSearch;
use app\models\MeasurementSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Freebies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="freebies-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


          
                <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>
            </div>
           <div class="col-md-6">
               <?= $form->field($model, 'image_input', Yii::$app->template->_form('folder'))->fileInput(['class' => 'image-input']) ?>

                
                <h1><i class="fa fa-spinner"></i></h1>


                <img 
                    id="image-preview" 
                    src="<?= Yii::$app->template->_image($model->image) ?>" 
                    alt="" 
                    class="img-thumbnail" 
                    width="200"
                     height="200">
           </div>
        </div>
        

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
