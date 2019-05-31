<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = '';



?>

<div class="row">
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-primary">
            <div class="card-body pb-0">
                <div class="btn-group float-right">
                    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <div class="text-value"><?= $total_merchants ?></div>
                <div>Registered Merchants</div>
            </div>
            <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart1" height="70"></canvas>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-success">
            <div class="card-body pb-0">
                <div class="btn-group float-right">
                    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <div class="text-value">9999</div>
                <div>Sales</div>
            </div>
            <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart3" height="70"></canvas>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-info">
            <div class="card-body pb-0">
                <div class="btn-group float-right">
                    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <div class="text-value">9.823</div>
                <div>Egifts Creation</div>
            </div>
            <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart2" height="70"></canvas>
            </div>
        </div>
    </div>


    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-danger">
            <div class="card-body pb-0">
                <div class="btn-group float-right">
                    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-settings"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <div class="text-value">9.823</div>
                <div>Egifts Usage</div>
            </div>
            <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                <canvas class="chart" id="card-chart4" height="70"></canvas>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-sm-5">
        <h4 class="card-title mb-0">E-Gifts</h4>
        <div class="small text-muted">November 2017</div>
    </div>
<!-- /.col-->
    <div class="col-sm-7 d-none d-md-block">
        <button class="btn btn-primary float-right" type="button">
            <i class="icon-cloud-download"></i>
        </button>
        <div class="btn-group btn-group-toggle float-right mr-3" data-toggle="buttons">
            <label class="btn btn-primary btn-outline-secondary">
                <input id="option1" type="radio" name="options" autocomplete="off"> Day
            </label>
            <label class="btn btn-primary btn-outline-secondary active">
                <input id="option2" type="radio" name="options" autocomplete="off" checked=""> Month
            </label>
            <label class="btn btn-primary btn-outline-secondary">
                <input id="option3" type="radio" name="options" autocomplete="off"> Year
            </label>
        </div>
    </div>
<!-- /.col-->
</div>
    <!-- /.row-->
<div class="chart-wrapper" style="height:300px;margin-top:40px;">
    <canvas class="chart" id="main-chart" height="300"></canvas>
</div>


