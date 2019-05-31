<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Wishlist */

$this->title = 'Create Wishlist';
$this->params['breadcrumbs'][] = ['label' => 'Wishlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wishlist-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr>   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
