<?php
    use yii\helpers\Html;
    
    $icons = \app\models\IconSearch::dropDown();
    $routes = Yii::$app->permission->getRoutes();
?>

<div class="row main-menu-panel" data-key="<?= $main_key ?>">

    <div class="col-md-4">
        <input value="<?= isset($main_nav['title'])? $main_nav['title']: '' ?>" class="form-control" type="text" placeholder="Menu Title" name="Role[navigation][<?= $main_key ?>][title]">
    </div>
    
    <div class="col-md-4">
        <input name="Role[navigation][<?= $main_key ?>][url]" type="text" list="<?= $main_key ?>" class="form-control route-list text-unset" placeholder="Select"  value="<?= isset($main_nav['url'])? $main_nav['url'] :'' ?>">

        <datalist id="<?= $main_key ?>">
            <?php foreach($routes as $route): ?>
                <option value="<?= $route ?>"> 
                    <?= $route ?>
                </option>
            <?php endforeach ?>
        </datalist> 

        

    </div>

    <div class="col-md-2">
        <input name="Role[navigation][<?= $main_key ?>][icon]" type="text" list="<?= $main_key ?>icons" class="form-control text-unset" placeholder="Select" value="<?= isset($main_nav['icon'])? $main_nav['icon'] :'' ?>">

        <datalist id="<?= $main_key ?>icons">
            <?php foreach($icons as $icon): ?>
                <option value="<?= $icon ?>"> 
                    <?= $icon ?>
                </option>
            <?php endforeach ?>
        </datalist> 

    </div>
    <div class="col-md-1 ">
        <div class="btn-group btn-group-justified ">
            <?= Html::a('Submenu', '#!', ['class' => 'btn btn-primary btn-sm btn-add-sub-menu']) ?>
            <?= Html::a('<i class="fa fa-trash"></i>', '#!', ['class' => 'btn btn-danger btn-sm btn-remove-main-menu-panel']) ?>
            <?= Html::a('<i class="fa fa-navicon"></i>', '#submenu' . $main_key, ['class' => 'btn btn-success btn-sm', 'data-toggle' => 'collapse']) ?>
        </div>
    </div>
    <div class="sub-menu sortable collapse show" id="submenu<?= $main_key ?>">
        <?php if((isset($from) && $from == 'update') && isset($main_nav['sub']) && !empty($main_nav['sub'])): ?>
            <?php foreach ($main_nav['sub'] as $sub_key => $sub_nav): ?>
                <?= $this->render('_sub-menu', [
                    'main_key' => $main_key,
                    'sub_key' => $sub_key,
                    'sub_nav' => $sub_nav,
                    'icons' => $icons,
                ]) ?>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>