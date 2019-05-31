<?php 
use yii\helpers\Html;
$page = isset($this->params['page']) ? $this->params['page']: '';
?>

<header id="header">
    <a class="logo" href="index.html">
    <!-- <img class="img-responsive" height="100" src="<?= Yii::$app->template->getLogo() ?>" alt="CoreUI Logo"> -->
    </a>

    <nav class="all">
        <?= Html::a('HOME', ['/'], ['class' => $page == 'home' ? 'navi active': 'navi']) ?>

        <?= Html::a('EGIFTS', ['site/merchants'], ['class' => 'navi']) ?>

        <?= Html::a('MERCHANTS', ['/merchants'], ['class' => $page == 'merchant_list' ? 'navi active': 'navi']) ?>

      
        
        <?= Html::a('ABOUT US', ['site/merchants'], ['class' => 'navi']) ?>
    </nav>
    <nav class="burger">
        <a class="burger-menu" href="#menu"></a>
    </nav>
</header>