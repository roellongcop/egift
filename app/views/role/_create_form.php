<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$menus = Yii::$app->permission->controllerActions();

?>

<div class="role-form">

	<?php $form = ActiveForm::begin(); ?>
		<h2>Create Role</h2> <hr>

		<div class="row">
			<div class="col-md-6">
				<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			</div>
		</div>
	

		<div class="card">
			<div class="card-header">
				ACTIONS
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<th>
							<label>
								<input type="checkbox" id="check-all-checkbox">
								Module
							</label>
						</th>
						<th>Actions</th>
					</thead>
					<tbody>
						<?php foreach ($menus as $key => $value) : ?>
							<tr>
								<td width="25%">
									<label>
										<input type="checkbox" class="check-all-action" data-key="Role[actions][<?= $key ?>][]">
										<?= ucwords($key) ?>
									</label>
									
								</td>
								<td>
									<?php foreach ($value as $action) : ?>
										<label>
											<input type="checkbox" name="Role[actions][<?= $key ?>][]" value="<?= $action ?>">
											<?= $action ?>
										</label>
									<?php endforeach; ?>
								</td>
							</tr>
						<?php endforeach; ?>
						<tr>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="card">
			<div class="card-header">NAVIGATION</div>
			<div class="card-body">
				<p>
					<a href="#!"class="btn btn-primary add-menu">Add Menu</a>
				</p>

				<div class="main-menu sortable"></div>

			</div>
		</div>



	<div class="form-group">
		<?= Html::submitButton('Save Roles', ['class' => 'btn btn-success btn-lg']) ?>
	</div>

	<?php ActiveForm::end(); ?>



 

</div>
