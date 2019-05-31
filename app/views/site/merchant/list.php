<?php
use yii\widgets\ListView;
$this->title = 'Merchants | List';
$this->params['page'] = 'merchant_list';
?>


<!-- Heading -->
<div id="heading" style="background-image: linear-gradient(rgba(206, 27, 27, 0.61), rgba(16, 228, 187, 0.66)), url(<?= Yii::$app->template->_image('uploads/images/bg-2.jpeg') ?>">
    <h1>MERCHANTS</h1>
</div>



<!-- Main -->
<section class="wrapper">
    <div class="inner">
        <header class="special">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ad, repudiandae, nam expedita doloremque sint ipsum ipsam non adipisci soluta dignissimos voluptate illo odio praesentium! Magnam temporibus laudantium error nesciunt.</p>
        </header>
        
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_details',
            'layout' => '{summary}<div class="highlights">{items}</div>{pager}',
             'pager' => [
                'options' => [
                    'tag' => 'div',
                    'class' => 'pager-wrapper',
                    'id' => 'pager-container',
                ],
            ]
        ]) ?>

    </div>
</section>

