<?php

use yii\helpers\Html;
use yii\widgets\ListView;

 
?>
<div class="egift-freebies-index">
    <table class="table table-responsive-sm table-bordered table-striped table-sm">
        <thead>
            <th>Freebies</th>
            <th>Quantity</th>
            <th>Remove</th>
        </thead>
        <tbody>
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_detail',
            ]); ?>
        </tbody>
    </table>
    
</div>
