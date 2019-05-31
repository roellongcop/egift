<?php
use app\models\NatureOfBusinessSearch;
$records = NatureOfBusinessSearch::lists(false, 6);
?>

<section class="wrapper">
    <div class="inner">
        <header class="special">
            <h2> egift category</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt ad, repudiandae, nam expedita doloremque sint ipsum ipsam non adipisci soluta dignissimos voluptate illo odio praesentium! Magnam temporibus laudantium error nesciunt.</p>
        </header>
        <div class="highlights">
            <?php foreach ($records as $nob): ?>
                <section class="enlarge">
                    <div class="content">
                        <header>
                            <a href="#" class="icon <?= $nob->icon->name ?>">
                                <span class="label"><?= $nob->_name ?></span>
                            </a>
                            <h3><?= $nob->_name ?></h3>
                        </header>
                        <p><?= $nob->_description ?></p>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>
    </div>
</section>