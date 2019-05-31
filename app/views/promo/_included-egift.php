<?php foreach ($records as $model) : ?>

<div class="alert alert-info">
	<?= ucwords($model['name']) ?>
</div>
<?php endforeach; ?>