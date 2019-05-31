<?php $li = "list-group-item d-flex list-group-item-action justify-content-between align-items-center"; ?>

<div class="card">
  <div class="card-header">
    <i class="fa fa-align-justify"></i> <?= $model->_name ?>
    <small>| Details</small>
  </div>
  <div class="card-body">
    <ul class="list-group">
      <li class="<?= $li?>">Price: <?= $model->_price ?></li>
      <li class="<?= $li?>">Quantity: <?= $model->qty ?></li>
    </ul>
  </div>
</div>
