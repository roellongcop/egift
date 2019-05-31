<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Faq */

$this->title = 'Create Question';
$this->params['breadcrumbs'][] = ['label' => 'Frequently Ask Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-create">

    <h2><?= Html::encode($this->title) ?></h2> <hr> 

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
