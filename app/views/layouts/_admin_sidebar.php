<?php
use yii\helpers\Html; 

?>


<!-- <li class="nav-title">Theme</li> -->

           
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <?php #Yii::$app->permission->createSidebar(); ?>
            <?php Yii::$app->permission->generateSidebar(); ?>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>