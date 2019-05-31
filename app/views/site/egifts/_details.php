
<?php 
use yii\helpers\Html;
?>


<div class="content" >

	<div class="row">
		<div class="col-4 col-12-medium">
    		<div class="center">
                <img class="egift-img" src="<?= Yii::$app->template->_image($model->image) ?>">
               
            </div>
    	</div>
    	<div class="col-8 col-12-medium">
             <header>
        		<h2><?= $model->_name ?></h2>
            </header>
    		<h3>AVAILABLE PRICES</h3>
    		<table>
    			<thead>
    				<th>ORIGINAL PRICE</th>
    				<th>SALE PRICE</th>

    			</thead>
    			<tbody>
    				<?php foreach ($model->priceVariety as $pr) : ?>
    					<tr>
    						<td>₱ <?= number_format($pr->orig_price, 2) ?></td>
    						<td>₱ <?= number_format($pr->sale_price, 2) ?></td>
    					</tr>
    				<?php endforeach; ?>
    			</tbody>
    		</table>
    	</div>
	</div>
    
 </div>
       