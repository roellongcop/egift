<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Freebies */

$this->title = $model->_name;
$this->params['breadcrumbs'][] = ['label' => 'Freebies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="freebies-view">

    <h2><?= Html::encode($this->title) ?></h2> <hr>

    <p>
        <?= Yii::$app->template->updateButton($model); ?> 
        <?= Yii::$app->template->deleteButton($model); ?> 
    </p>

    <div class="row">
        <div class="col-md-8">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    '_name',
                    '_description:ntext',
                    // 'category._name',
                    // 'supplier._name',
                    // 'measurement._name',
                    // '_price',
                    // 'qty',
                    '_created_at',
                    '_updated_at',
                ],
            ]) ?>
        </div>
        <div class="col-md-4">
            <img src="<?= Yii::$app->template->_image($model->image) ?>"class="img-thumbnail" >
        </div>
    </div>
    

</div>
