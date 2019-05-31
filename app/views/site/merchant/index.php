<?php
use yii\helpers\Html;
use app\models\UserSearch;
$records = UserSearch::getMerchants();
?>

<section class="wrapper">
    <div class="inner">
        <header class="special">
            <h2>our merchants</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ad, repudiandae, nam expedita doloremque sint ipsum ipsam non adipisci soluta dignissimos voluptate illo odio praesentium! Magnam temporibus laudantium error nesciunt.</p>
        </header>
        <div class="highlights">
            <?php foreach ($records as $merchant): ?>
                <?= $this->render('_details', ['model' => $merchant]) ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>