<?php
use yii\helpers\Html;
?>

<div class="col-6 col-lg-3">
	<div class="card">
		<div class="card-body p-3 d-flex align-items-center">
			<?= Html::a('<img class="freebies-img" src="'. Yii::$app->template->_image($model->freebies->image).'" >', ['freebies/view', 'id' => $model->freebies->id]) ?>


			<div>
				<div class="text-value-sm text-primary">
					<?= Html::a('(' .$model->qty . ') ' . $model->freebies->_name, ['freebies/view', 'id' => $model->freebies->id]) ?>
				</div>
				<div class="text-muted text-uppercase font-weight-bold small">
					<?= $model->freebies->_price ?>
				</div>
			</div>
		</div>

		<div class="card-footer px-3 py-2">
			<?= Html::a('<span class="small font-weight-bold">View More</span> <i class="fa fa-angle-right"></i>', ['freebies/view', 'id' => $model->freebies->id], [
				'class' => '"btn-block text-muted d-flex justify-content-between align-items-center'
			]) ?>

      	</div>


	</div>
</div>
