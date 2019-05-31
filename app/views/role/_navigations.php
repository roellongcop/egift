

<?php foreach ($navigations as $main_key => $main) : ?>
<ul>
    <li> <i class="<?= $main['icon'] ?>"></i> <?= $main['title'] ?> (<?= $main['url'] ?>)</li>
     
    <?php if(isset($main['sub']) && !empty($main['sub'])): ?>
        <?php foreach ($main['sub'] as $sub_key => $sub) : ?>
            <ul>
                <li> <i class="<?= $sub['icon'] ?>"></i> <?= $sub['title'] ?> (<?= $sub['url'] ?>)</li>
            </ul>
        <?php endforeach ?>
    <?php endif ?>
</ul>
<?php endforeach ?>