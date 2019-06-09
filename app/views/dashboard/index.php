<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
$this->title = 'Dashboard';
$this->params['breadcrumbs'][] = '';



?>
<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">..1.</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...2</div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...3</div>
</div>

<div class="row" id="super-admin-dashboard">
    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-primary">
            <div class="card-body pb-0">
                <div class="btn-group float-right">
                    <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-navicon"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"> (<?= $overall_merchants ?>) All</a>
                        <a class="dropdown-item" href="#"> (<?= $authorized_merchants ?>) Authorized</a>
                        <a class="dropdown-item" href="#"> (<?= $unauthorized_merchants ?>) Un authorized</a>
                    </div>
                </div>
                <div class="text-value"><?= $total_merchants ?></div>
                <div><b>( <?= $total_merchants_year ?> )</b> Registered Merchants this year</div>
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
                        <i class="fa fa-navicon"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <div class="text-value"><?= $sales ?></div>
                <div><b>( <?= $sales_year ?> )</b> Sales this year</div>
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
                        <i class="fa fa-navicon"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"> (<?= $overall_egift_creation ?>) All</a>
                        <a class="dropdown-item" href="#">(<?= $approved_egift ?>) Approved</a>
                        <a class="dropdown-item" href="#">(<?= $for_approval_egift ?>) For Approval</a>
                    </div>
                </div>
                <div class="text-value"><?= $egift_creation ?></div>
                <div> <b>( <?= $egift_creation_year ?> )</b> Egifts Creation this year</div>
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
                        <i class="fa fa-navicon"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
                <div class="text-value"><?= $egift_usage ?></div>
                <div> <b>( <?= $egift_usage_year ?> )</b> Egifts Usage this year</div>
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


