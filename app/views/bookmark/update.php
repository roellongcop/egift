<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bookmark */

$this->title = 'Update Bookmark';
$this->params['breadcrumbs'][] = ['label' => 'Bookmarks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bookmark-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr>  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
