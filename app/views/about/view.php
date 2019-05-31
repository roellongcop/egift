<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\About */

$this->title = 'Our Information';
$this->params['breadcrumbs'][] = ['label' => 'Abouts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-view">

    <h2><?= $model->_logo ?>  <?= Html::encode($this->title) ?></h2> <hr>


    <?php if (Yii::$app->permission->canUpdate()) : ?>
        <p>
            <?= Html::a('Update Information', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </p>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'description:raw',
            'address:raw',
            'mission:raw',
            'vision:raw',
            'history:raw',
            'email:email',
            'contact_no',
            'facebook',
            'twitter',
            'instagram',
            'yahoo',
            'terms_and_condition:raw',
            'privacy_policy:raw',
            '_status:raw',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
