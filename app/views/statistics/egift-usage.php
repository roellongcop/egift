<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EgiftUsageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Egift Usages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="egift-usage-index">
 
    <h2><?= Html::encode($this->title) ?></h2> <hr>

  


    <div class="chart-wrapper" style="height:300px;margin-top:40px;">
        <canvas class="chart" id="main-chart" height="300"></canvas>
    </div>
</div>
