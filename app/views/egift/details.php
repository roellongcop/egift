<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Egifts | ' . $model->_description;
$this->params['title'] = 'Egifts Details';
?>
<section class="blog_area single-post-area p_120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post row">
                    <div class="col-lg-12">
                        <div class="feature-img">
                            <img class="img-fluid" src="<?= Yii::$app->template->_image($model->image) ?>" alt="">
                        </div>									
                    </div>
                    <div class="col-lg-3  col-md-3">
                        <div class="blog_info text-right">
                            <ul class="blog_meta list">
                                <li>
                                    <a href="<?= Url::to('#') ?>">
                                        <?= $model->merchant->_name ?>
                                        <i class="fa fa-user"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="<?= Url::to('#') ?>">
                                        <?= $model->category->_name ?>
                                        <i class="fa fa-gear"></i>
                                    </a>
                                </li>
 
 

                                 <!--<li><a href="#">12 Dec, 2017<i class="lnr lnr-calendar-full"></i></a></li>
                                <li><a href="#">1.2M Views<i class="lnr lnr-eye"></i></a></li>
                                <li><a href="#">06 Comments<i class="lnr lnr-bubble"></i></a></li> -->
                            </ul>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-github"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 blog_details">
                        <h2><?= $model->_description ?>
                           
                        </h2>
                        <p class="excert">
                            Stock: <?= $model->stock ?> <br> 
                        </p>
                        <a href="#" class="genric-btn info">
                            Add to Cart
                            <i class="fa fa-shopping-cart"></i>
                        </a>                               
                    </div>
                    <div class="col-lg-12">
                        <div class="quotes">
                            MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.		
                        </div> 
                    </div>
                </div> 
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Egifts">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                            </span>
                        </div><!-- /input-group -->
                        <div class="br"></div>
                    </aside>
                    <aside class="single_sidebar_widget author_widget">
                        <img width="100" height="100" class="author_img rounded-circle" src="<?= Yii::$app->template->_image($model->merchant->logo) ?>" alt="">
                        <h4><?= $model->merchant->_name ?></h4>
                        <p><?= $model->merchant->tel_no ?></p>
                        <div class="social_icon">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-github"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                        <p><?= $model->merchant->_description ?>.</p>
                        <div class="br"></div>
                    </aside>

                    <?= $this->render('_suggested', ['model' => $model->merchant->egift]) ?>

                </div>
            </div>
        </div>
    </div>
</section>