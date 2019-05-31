<?php
    use yii\helpers\Html;
    $icons = \app\models\IconSearch::dropDown();
    $routes = Yii::$app->permission->getRoutes();

?>

<div class="row sub-menu-panel ">


    <div class="col-md-4">
        <input 
            value="<?= isset($sub_nav['title'])? $sub_nav['title']: '' ?>" 
            class="form-control" 
            type="text"
            placeholder="Menu Title" 
            name="Role[navigation][<?= $main_key ?>][sub][<?= $sub_key ?>][title]">
    </div>
    
    <div class="col-md-4">
        <input name="Role[navigation][<?= $main_key ?>][sub][<?= $sub_key ?>][url]" type="text" list="<?= $sub_key ?>"  class="form-control text-unset" placeholder="Select" 
            value="<?= isset($sub_nav['url'])? $sub_nav['url'] :'' ?>">

        <datalist id="<?= $sub_key ?>">
            <?php foreach($routes as $route): ?>
                <option value="<?= $route ?>"> 
                    <?= $route ?>
                </option>
            <?php endforeach ?>
        </datalist> 

       
    </div>

    <div class="col-md-3">
        <input name="Role[navigation][<?= $main_key ?>][sub][<?= $sub_key ?>][icon]" type="text" list="<?= $sub_key ?>icons" class="form-control text-unset" placeholder="Select" value="<?= isset($sub_nav['icon'])? $sub_nav['icon'] :'' ?>">

        <datalist id="<?= $sub_key ?>icons">
            <?php foreach($icons as $icon): ?>
                <option value="<?= $icon ?>"> 
                    <?= $icon ?>
                </option>
            <?php endforeach ?>
        </datalist> 

    </div>
    <div class="col-md-1">
        <?= Html::a('<i class="fa fa-trash"></i>', '#!', ['class' => 'btn btn-danger btn-sm btn-remove-sub-menu-panel']) ?>
    </div>

</div>