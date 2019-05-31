<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\IconSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Role */
/* @var $form yii\widgets\ActiveForm */
$icons = IconSearch::lists();

$menus = Yii::$app->params['menu'];

$access = $model->access ? json_decode($model->access, true): [];

?>

<div class="role-form">

	<?php $form = ActiveForm::begin(); ?>
		<h2>User Access</h2> <hr>

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
										<input type="checkbox" name="<?= $key ?>[title]" value="<?= $menu['title'] ?>" 
										<?= isset($access[$key]['title']) ? 'checked': ''  ?>>
										<?= $menu['title'] ?> 
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
							</div>
							<br>

							<div class="sortable">
								<?php foreach ($menu['sub'] as $sub_key => $sub) : ?>
									<div class="row sub-menu ui-state-default">
										<div class="col-md-2">
											<label>
												<input type="checkbox" name="<?= $key ?>[sub][<?= $sub_key ?>][title]" value="<?= $sub['title'] ?>" 
												<?= isset($access[$key]['sub'][$sub_key]['title']) ? 'checked': ''  ?>>
												<?= $sub['title'] ?>
											</label>
										</div>
										<div class="col-md-4" style="padding-left: 0px; padding-right: 30px;">
											<select name="<?= $key ?>[sub][<?= $sub_key ?>][icon]">
												<option value="<?= isset($access[$key]['sub'][$sub_key]['icon']) ? $access[$key]['sub'][$sub_key]['icon']: '' ?>">
													<?= isset($access[$key]['sub'][$sub_key]['icon'])? $access[$key]['sub'][$sub_key]['icon']: '' ?>
												</option>
												<?php foreach($icons as $icon): ?>
													<option value="<?= $icon->name ?>"><?= $icon->name ?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="col-md-6">
											<?php foreach (Yii::$app->permission->actions($sub_key) as $action) : ?>
												<label>
													<input <?= in_array($action, isset($access[$key]['sub'][$sub_key]['actions'])? $access[$key]['sub'][$sub_key]['actions']: [])? 'checked':'' ?> value="<?= $action ?>" type="checkbox" name="<?= $key ?>[sub][<?= $sub_key ?>][actions][]">
													<?= $action ?>
												</label>
											<?php endforeach; ?>
											
										</div><br>
									</div>
								<?php endforeach; ?>
							</div>
						</td>

						
					<?php else: ?>
						<td>
							<div class="row">
								<div class="col-md-2">
									<label>
										<input type="checkbox" name="<?= $key ?>[title]" value="<?= $menu['title'] ?>" <?= isset($access[$key]['title']) ? 'checked': ''  ?>>
										<?= $menu['title'] ?> 
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
											<input <?= in_array($action, isset($access[$key]['actions'])? $access[$key]['actions']: []) ? 'checked': '' ?> value="<?= $action ?>" type="checkbox" name="<?= $key ?>[actions][]">
											<?= $action ?>
										</label>
									<?php endforeach; ?>
								</div>
							</div>

							
						</td>
					  
						 
					   
					<?php endif; ?>
					</tr>

				<?php endforeach; ?> 


				<tr class="ui-state-default">
					<td>
						
						<div class="row">
							<div class="col-md-2">
								<label>
									<input type="checkbox" name="#action-pages[title]" value="Action Pages" 
									<?= isset($access['#action-pages']['title']) ? 'checked': ''  ?>>
									Action Pages
								</label>
							</div>
							<div class="col-md-4" style="padding-right: 30px;">
								<select name="<?= '#action-pages' ?>[icon]" class="form-control main-select">
									<option value="<?= isset($access['#action-pages']['icon']) ? $access['#action-pages']['icon']: '' ?>">
										<?= isset($access['#action-pages']['icon']) ? $access['#action-pages']['icon']: '' ?>
									</option>
									<?php foreach($icons as $icon): ?>
										<option value="<?= $icon->name ?>"><?= $icon->name ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<br>

						<div class="sortable">
							<?php foreach (Yii::$app->permission->getActionPages() as $sub_key => $sub) : ?>
								<div class="row sub-menu ui-state-default">
									<div class="col-md-2">
										<label>
											<input type="checkbox" name="#action-pages[sub][<?= $sub_key ?>][title]" value="<?= $sub_key ?>" 
											<?= isset($access['#action-pages']['sub'][$sub_key]['title']) ? 'checked': ''  ?>>
											<?= $sub_key ?>
										</label>
									</div>
									<div class="col-md-4" style="padding-left: 0px; padding-right: 30px;">
										<select name="#action-pages[sub][<?= $sub_key ?>][icon]" class="form-control">
											<option value="<?= isset($access['#action-pages']['sub'][$sub_key]['icon']) ? $access['#action-pages']['sub'][$sub_key]['icon']: '' ?>">
												<?= isset($access['#action-pages']['sub'][$sub_key]['icon'])? $access['#action-pages']['sub'][$sub_key]['icon']: '' ?>
											</option>
											<?php foreach($icons as $icon): ?>
												<option value="<?= $icon->name ?>"><?= $icon->name ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-md-6">
										<?php foreach (Yii::$app->permission->actions($sub_key) as $action) : ?>
											<label>
												<input <?= in_array($action, isset($access['#action-pages']['sub'][$sub_key]['actions'])? $access['#action-pages']['sub'][$sub_key]['actions']: [])? 'checked':'' ?> value="<?= $action ?>" type="checkbox" name="#action-pages[sub][<?= $sub_key ?>][actions][]">
												<?= $action ?>
											</label>
										<?php endforeach; ?>
										
									</div><br>
								</div>
							<?php endforeach; ?>
						</div>
					</td>
				</tr>

			   
			</tbody>
		</table>


	<div class="form-group">
		<?= Html::submitButton('Save Changes', ['class' => 'btn btn-success btn-lg']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
