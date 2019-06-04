<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\CategorySearch;
use app\models\FreebiesSearch;
use app\models\UserSearch;
use app\models\BranchesSearch;

/* @var $this yii\web\View */
/* @var $model app\models\Egift */
/* @var $form yii\widgets\ActiveForm */

$model->start_at = date('Y-m-d', strtotime($model->start_at));
$model->end_at = date('Y-m-d', strtotime($model->end_at));

?>
<div class="egift-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">
            <div class="col-md-6">

                <?php if(Yii::$app->user->identity->user_type === 9) {
                    echo $form->field($model, 'merchant_id')->dropDownList(
                        UserSearch::lists(),
                        ['prompt' => 'Select Merchant']
                    );
                } ?>

                

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
 

                


                <label id="price-variety-table" class="control-label" for="deploy-to-branches">
                    <input type="checkbox" id="deploy-to-branches">
                    Deploy to Branches
                </label>
                <table class="table table-bordered table-sm">
                    <tbody>
                        <?php foreach(BranchesSearch::lists(false) as $branch): ?>
                            <tr>
                                <td>
                                    <div class="checkbox">
                                        <label>
                                            <input class="deploy-to-branches" type="checkbox" name="Egift[branches][]" value="<?= $branch->id ?>" <?= in_array($branch->id, $model->_branches)? 'checked': '' ?>>
                                            <?= ucwords($branch->name) ?>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
 
            </div>
            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'stock')->textInput() ?>
                    </div> 
                </div>

                <div class="col-md-12">
                    <?= $form->field($model, 'promo')->checkbox() ?>
                </div> 


                <div  id="div-range">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'start_at')->textInput([
                                'type' => 'date'
                            ]) ?>
                        </div> 

                       
                        <div class="col-md-6">
                            <?= $form->field($model, 'end_at')->textInput([
                                'type' => 'date'
                            ]) ?>
                        </div> 
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'image_banner_input')->fileInput(['class' => 'image-input']) ?>

                        <img id="image-preview-banner" src="<?= Yii::$app->template->_image($model->image_banner) ?>" alt="" class="img-thumbnail" width="200" height="200">
                    </div>

                    <div class="col-md-6">
                        <?= $form->field($model, 'image_input')->fileInput(['class' => 'image-input']) ?>

                
                        <h1><i class="fa fa-spinner"></i></h1>

                        <img id="image-preview" src="<?= Yii::$app->template->_image($model->image) ?>" alt="" class="img-thumbnail" width="200" height="200">
                    </div>
                </div>
            </div>
        </div>

        <br><hr >
        <div class="row" >
            <div class="col-md-12">
                <h3  >Price Variety</h3>
                <div class="row"> 
                    <div class="col-md-4"><br> 
                        <div class="form-group field-pricevariety-orig_price required">
                            <input name="PriceVariety[orig_price]" class="form-control" id="pricevariety-orig_price" aria-invalid="true" aria-required="true" type="number" placeholder="Original Price (₱)">
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group field-pricevariety-sale_price required">
                            <input name="PriceVariety[sale_price]" class="form-control" id="pricevariety-sale_price" aria-invalid="true" aria-required="true" type="hidden" placeholder="Sale Price (₱)">

                            <select id="percent-discount" class="form-control">
                                <option value="" >Select Discount Percentage</option>
                                <option value="10">10%</option>

                                <?php for ($i=11; $i <= 100; $i++) : ?> 
                                    <option value="<?= $i ?>"><?= $i ?>%</option>
                                <?php endfor ?>

                            </select>

                            <div class="help-block"></div>
                        </div>
 
                        <a href="#price-variety-table" class="btn btn-primary btn-block btn-add-price-variety">
                            ADD <i class="fa fa-refresh"></i>
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="loader"></div>
                        <div class="price-variety"></div>
                    </div>
                </div>
            </div>
        </div>
       

        <br><hr>
        <div class="row" id="app">
            <div class="col-md-12">
                <h3>Freebies</h3>
                <div class="row">
                    <div class="col-md-4"> <br>
                        <div class="form-group field-egift-freebies-select required">
                            <select class="form-control" id="freebies-select">
                                <option value="" disabled selected>Select Freebies</option>
                                <?php foreach (FreebiesSearch::lists(false) as $key => $freebies) : ?>
                                    <option value="<?= $freebies->id ?>" >
                                        <?= $freebies->_name ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="help-block"></div>
                        </div>

                        <div class="form-group field-egift-freebies-qty required">
                            <input id="freebies-qty" min="1" type="number" class="form-control" placeholder="Quantity">
                                
                            <div class="help-block"></div>
                        </div> 
                        <a href="#freebies-table" class="btn btn-primary btn-block btn-add-freebies">
                             ADD
                        </a>
                        <br>

                        <div class="freebies-details"></div>

                    </div> 
                    <div class="col-md-8">
                        <div class="loader-2"></div>
                        <div class="freebies-table"> </div>
                    </div> 
                </div> 
            </div>

        </div>

     

        <div class="form-group"> <br>
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
