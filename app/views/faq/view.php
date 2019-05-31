<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */

$this->title = $model->_question;
$this->params['breadcrumbs'][] = ['label' => 'Frequently Ask Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-view">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 

    
    <p>
        <?= Yii::$app->template->updateButton($model); ?> 
        <?= Yii::$app->template->deleteButton($model, 'id'); ?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'question',
            'answer:ntext',
            '_status:raw',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
