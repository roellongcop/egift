
<?php 
use yii\helpers\Html;
?>

<nav id="menu">
    <ul class="links">
        <li> 
        	<?= Html::a('<i class="fa fa-home"></i> HOME', ['/'], [
        		'class' => 'navi'
        	]) ?>
    	</li>

        <li> 
        	<?= Html::a('<i class="fa fa-envelope"></i> EGIFTS', 
	        	['/merchants'], ['class' => 'navi']
	        ) ?>
    	</li>

        <li> 
        	<?= Html::a('<i class="fa fa-user"></i> MERCHANTS', 
	        	['/merchants'], ['class' => 'navi']
	        ) ?>
    	</li>

  
        <li> 
        	<?= Html::a('<i class="fa fa-info"></i> ABOUT US', 
	        	['/'], ['class' => 'navi']
	        ) ?>
    	</li>
    </ul>
</nav> 
