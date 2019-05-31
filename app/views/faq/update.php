<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Faq */

$this->title = 'Update Question: ' . $model->_question;
$this->params['breadcrumbs'][] = ['label' => 'Frequently Ask Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_question, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="faq-update">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
