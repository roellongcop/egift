<?php
use yii\helpers\Html;
$this->title = 'Merchant | ' . $model->profile->_name;
$this->params['page'] = 'merchant_list';
?>


<!-- Heading -->
<div id="heading" style="background-image: linear-gradient(135deg, #1d9bc600, rgba(16, 228, 187, 0)), url(<?= Yii::$app->template->_image('uploads/images/bg-2.jpeg') ?>">
    <h1><?= $model->profile->_name ?></h1>
</div>



<!-- Main -->
<section id="main" class="wrapper">
    <div class="inner">
        <div class="content" >
            <header>
                <div class="center">
                    <img class="merchant-profile-img" src="<?= Yii::$app->template->_image($model->profile->logo) ?>">
                </div>
                <h2>About  <?= $model->profile->_name ?></h2>
            </header>
            <p class="indent-justify"><?= $model->profile->_description ?> </p>
            

            <hr />

            <h3>Nature of Business</h3>
            <?= $model->profile->_nature_of_business ?>


            <hr />
            <h3>Contact Details</h3>
            * Email: <?= $model->email ?> <br>
            * Telephone No: <?= $model->email ?> <br>
            * Address: <?= $model->profile->tel_no ?> <br>


            <br> <br>
            <?= Html::a('<button class="primary view-egift"> VIEW EGIFTS</button>', ['site/merchant-egifts', 'id' => $model->id]) ?>
            
            
        </div>
    </div>
</section>
