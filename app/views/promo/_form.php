<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\EgiftSearch;
use app\models\UserSearch;


/* @var $this yii\web\View */
/* @var $model app\models\Promo */
/* @var $form yii\widgets\ActiveForm */

 

?>

<div class="promo-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <?php if(Yii::$app->user->identity->user_type === 0): ?>

                    <input type="hidden" id="promo-id" value="<?= $model->id ?>">

                    <?= $form->field($model, 'merchant_id')->dropDownList(
                        UserSearch::lists(),
                        ['prompt' => 'Select Merchant']
                    ); ?>
                <?php endif; ?>


                <?= $form->field($model, 'name')->textInput([
                    'maxlength' => true
                ]) ?>

                <?= $form->field($model, 'description')->textarea([
                    'rows' => 6
                ]) ?>

                <?= $form->field($model, 'start_at')->textInput([
                    'type' => 'date'
                ]) ?>

                <?= $form->field($model, 'end_at')->textInput([
                    'type' => 'date'
                ]) ?>
            </div>
               

            <div class="col-md-6">
                <label class="control-label" for="included-egifts">
                    <input type="checkbox" id="included-egifts">
                    Included Egift
                </label>
                <table class="table table-bordered table-sm" id="div-included-egifts">
                    <tbody>
                        <?php foreach(EgiftSearch::lists(true) as $egift): ?>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input class="included-egifts" type="checkbox" name="Promo[included_egift][]" value="<?= $egift->id ?>" <?= in_array($egift->id, $model->_included_egift)? 'checked': '' ?> >
                                            <?= ucwords($egift->name) ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
            </div>
        </div>

    


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
