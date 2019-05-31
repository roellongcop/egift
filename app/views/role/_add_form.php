<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\IconSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Role */
/* @var $form yii\widgets\ActiveForm */
$icons = IconSearch::lists();

$menus = Yii::$app->params['menu'];

?>

<div class="role-form">

	<?php $form = ActiveForm::begin(); ?>
		<h2>Create Role</h2> <hr>

		<div class="row">
			<div class="col-md-6">
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			</div>
		</div>


		<table class="table">
			<tbody class="sortable">
				<tr>
					<th>
						<div class="row">
							<div class="col-md-2">MODULE</div>
							<div class="col-md-4">ICON</div>
							<div class="col-md-6">ACTIONS</div>
						</div>
					</th>
				</tr>
				<?php foreach ($menus as $key => $menu) : ?>
					<tr class="ui-state-default">
					<?php if(isset($menu['sub']) && !empty($menu['sub'])): ?>
						<td>
							<div class="row">
								<div class="col-md-2">
									<label>
										<input type="checkbox" name="<?= $key ?>[title]" value="<?= $menu['title'] ?>" >
										<?= $menu['title'] ?> 
									</label>
								</div>
								<div class="col-md-4" style="padding-right: 30px;">
									<select name="<?= $key ?>[icon]" class="form-control main-select">
										<?php foreach($icons as $icon): ?>
											<option value="<?= $icon->name ?>"> 
												<?= $icon->name ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<br>

							<div class="sortable">
								<?php foreach ($menu['sub'] as $sub_key => $sub) : ?>
							
									<div class="row sub-menu ui-state-default">
										<div class="col-md-2">
											<label>
												<input type="checkbox" name="<?= $key ?>[sub][<?= $sub_key ?>][title]" value="<?= $sub['title'] ?>">
												<?= $sub['title'] ?>
											</label>
										</div>
										<div class="col-md-4" style="padding-left: 0px; padding-right: 30px;">
											<select name="<?= $key ?>[sub][<?= $sub_key ?>][icon]" class="form-control">
												<?php foreach($icons as $icon): ?>
													<option value="<?= $icon->name ?>"><?= $icon->name ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-6">
											<?php foreach (Yii::$app->permission->actions($sub_key) as $action) : ?>
												<label>
													<input value="<?= $action ?>" type="checkbox" name="<?= $key ?>[sub][<?= $sub_key ?>][actions][]">
													<?= $action ?>
												</label>
											<?php endforeach; ?>
											
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</td>

						
					<?php else: ?>
						<td>
							<div class="row">
								<div class="col-md-2">
									<label>
										<input type="checkbox" name="<?= $key ?>[title]" value="<?= $menu['title'] ?>" >
										<?= $menu['title'] ?> 
									</label>
								</div>
								<div class="col-md-4" style="padding-right: 30px;"> 
									<select name="<?= $key ?>[icon]" class="form-control main-select">
										<?php foreach($icons as $icon): ?>
											<option  value="<?= $icon->name ?>"><?= $icon->name ?> </option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-6">
									<?php foreach (Yii::$app->permission->actions($key) as $action) : ?>
										<label>
											<input value="<?= $action ?>" type="checkbox" name="<?= $key ?>[actions][]">
											<?= $action ?>
										</label>
									<?php endforeach; ?>
								</div>
							</div>
 
						</td> 
					   
					<?php endif; ?>
					</tr>

				<?php endforeach; ?> 

				<?php foreach (Yii::$app->permission->getActionPages() as $key => $menu) : ?>
					<tr class="ui-state-default">
						<td>
							<div class="row">
								<div class="col-md-2">
									<label>
										<input type="checkbox" name="<?= $key ?>[title]" value="<?= $key ?>" >
										<?= ucwords($key) ?> 
									</label>
								</div>
								<div class="col-md-4" style="padding-right: 30px;">
									<select name="<?= $key ?>[icon]" class="form-control main-select">
										<option value="<?= isset($access[$key]['icon']) ? $access[$key]['icon']: '' ?>">
											<?= isset($access[$key]['icon']) ? $access[$key]['icon']: '' ?>
										</option>
										<?php foreach($icons as $icon): ?>
											<option value="<?= $icon->name ?>"><?= $icon->name ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-6">
									<?php foreach (Yii::$app->permission->actions($key) as $action) : ?>
										<label>
											<input value="<?= $action ?>" type="checkbox" name="<?= $key ?>[actions][]">
											<?= $action ?>
										</label>
									<?php endforeach; ?>
								</div>
							</div>
							
						</td>
					</tr>
				<?php endforeach; ?> 

			</tbody>
		</table>


	<div class="form-group">
		<?= Html::submitButton('Save Roles', ['class' => 'btn btn-success btn-lg']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
