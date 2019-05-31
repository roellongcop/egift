<?php
use yii\helpers\Html;
?>
<tr>
	<td> ₱ <?= number_format($model->orig_price, 2) ?> </td>
	<td> <?= $model->percentage ?>% </td>
	<td> ₱ <?= number_format($model->sale_price, 2) ?> </td>
	<td width="70" class="text-center">
		<a data-id="<?= $model->id ?>" href="#price-variety-table" class="btn btn-danger btn-sm btn-remove-price-variety">
			<i class="fa fa-trash"></i>
		</a>
	</td>
</tr>