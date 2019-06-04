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

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Egift Information
                </div>
                <div class="card-body">
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

    </div>


    <br><br>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <?= ($model->branchesList == null) ? 'No ': '' ?> Available Branches
                </div>
                <div class="card-body">
                     <table class="table table-bordered">
                        <tbody>
                            <?php foreach ($model->branchesList as $branch) : ?>
                                <tr>
                                    <td>
                                        <?= ucwords($branch->name) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <br><br>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <?= ($model->priceVariety == null) ? 'No ': '' ?>Price Variety
                </div>
                <div class="card-body">
                     <table class="table table-bordered">
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
    </div>
    <br><br>

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
