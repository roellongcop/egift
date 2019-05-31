<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bookmark */

$this->title = 'Create Bookmark';
$this->params['breadcrumbs'][] = ['label' => 'Bookmarks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookmark-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
