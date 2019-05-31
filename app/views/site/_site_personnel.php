<?php
use app\models\PersonnelSearch;
$records = PersonnelSearch::lists();
?>
<section class="wrapper">
    <div class="inner">
        <header class="special">
            <h2>who we are</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eos voluptas officia accusamus. Enim velit sunt hic ut quod doloribus mollitia inventore dicta. Ipsum non sequi deleniti dolorem totam optio dignissimos!</p>
        </header>
        <div class="testimonials">
            <?php foreach ($records as $personnel) : ?>
                <section>
                    <div class="content">
                        <blockquote>
                            <p><?= $personnel->_inspiring_message ?></p>
                        </blockquote>
                        <div class="author">
                            <div class="image">
                                <img src="<?= Yii::$app->template->_image($personnel->logo) ?>" alt="" />
                            </div>
                            <p class="credit">- 
                                <strong><?= $personnel->_fullname ?></strong> 
                                <span><?= $personnel->_position ?>  - <?= $personnel->_company_name ?></span>
                            </p>
                        </div>
                    </div>
                </section> 
            <?php endforeach; ?>
        </div>
    </div>
</section>