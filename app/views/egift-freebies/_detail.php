<?php
use yii\helpers\Html;
?>
<tr>
	<td> <?= Html::a($model->freebies->_name, ['freebies/view', 'id' => $model->freebies->id]) ?> </td>
	<td><?= $model->qty ?></td>
	<td width="70" class="text-center">
		<a data-id="<?= $model->id ?>" href="#freebies-table" class="btn btn-danger btn-sm btn-remove-freebies">
			<i class="fa fa-trash"></i>
		</a>
	</td>
</tr>