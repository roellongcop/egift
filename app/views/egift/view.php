<?php

    use yii\helpers\Html;
    use yii\widgets\DetailView;

    /* @var $this yii\web\View */
    /* @var $model app\models\Egift */

    $this->title = $model->_description;
    $this->params['breadcrumbs'][] = ['label' => 'Egifts', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    $branches = $model->getbranchesList(true);
    ?>
    <div class="egift-view">

        <h2><?= Html::encode($this->title) ?>

    </h2> 
    <?php if($model->promo): ?>
        <div class="alert alert-info">
            On Promo | From: <?= $model->start_at ?> | To: <?= $model->end_at ?>
        </div>
    <?php endif; ?>

    <?php if(Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <hr>


    <p>
        <?= Yii::$app->template->updateButton($model); ?> 
        <?= Yii::$app->template->deleteButton($model, '_description'); ?> 

        <?php if(Yii::$app->user->identity->user_type == 9): ?>
            <?= Yii::$app->template->approvedEgift($model); ?> 
            <?= Yii::$app->template->disapprovedEgift($model); ?> 
        <?php endif ?>

    </p>


    <nav>
        <div class="nav nav-tabs" role="tablist">
            <a class="nav-item nav-link active"  data-toggle="tab" href="#nav-details" role="tab">Details</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#nav-prices" role="tab">Price Variety</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#nav-freebies" role="tab">Freebies</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#nav-branches" role="tab" >Branches</a>
            <a class="nav-item nav-link" data-toggle="tab" href="#nav-images" role="tab">Images</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-details" role="tabpanel" >
            <div class="row">
                <div class="col-md-12">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            '_name',
                            '_description:ntext',
                            'stock',
                            // 'referral_code',
                            '_created_at',
                            '_updated_at',
                            'qr:raw', 
                        ],
                    ]) ?>
                </div>

            </div>
        </div>

        <div class="tab-pane fade" id="nav-prices" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>Original Price</th>
                            <th>Sale Price</th>
                        </thead>
                        <tbody>
                            <?php foreach ($model->priceVariety as $variety) : ?>
                                <tr>
                                    <td> ₱ <?= number_format($variety->orig_price, 2) ?> </td>
                                    <td> ₱ <?= number_format($variety->sale_price, 2) ?> </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-freebies" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <?= ($model->egiftFreebies == null) ? 'No ': '' ?>Freebies
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <?php foreach ($model->egiftFreebies as $key => $freebies) : ?>
                                    <?= $this->render('_freebies', [ 
                                        'model' => $freebies
                                    ]); ?>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>


        
        <div class="tab-pane fade" id="nav-branches" role="tabpanel">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tbody>
                            <?php foreach ($model->branchesList as $branch) : ?>
                                <tr>
                                    <td>
                                        <?= Html::a(ucwords($branch->name), ['branches/view', 'id' => $branch->id]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="tab-pane fade" id="nav-images" role="tabpanel">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Egift Banner Image
                        </div>
                        <div class="card-body">
                            <img src="<?= Yii::$app->template->_image($model->image_banner) ?>"class="img-thumbnail" >
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Egift Image
                        </div>
                        <div class="card-body">
                            <img src="<?= Yii::$app->template->_image($model->image) ?>"class="img-thumbnail" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


 

</div>
