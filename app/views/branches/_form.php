<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UserSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

	<?php $form = ActiveForm::begin(); ?>
		<div class="row">
			<div class="col-md-6">
				<?php if(Yii::$app->user->identity->user_type === 9): ?>
					<?= $form->field($model, 'merchant_id')->dropDownList(
						UserSearch::lists(),
						['prompt' => 'Select Merchant']
					) ?>
				<?php endif; ?>

				<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

				<div class="row">
					<div class="col-md-6">
						<?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>
					</div>

					<div class="col-md-6">
						<?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

					</div>
				</div>
 
			</div>
			<div class="col-md-6">
				<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
			</div>
		</div>
		
		<div class="row">
			
		</div>
		

		<div class="form-group">
			<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
