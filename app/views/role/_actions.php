
<div class="row">
<?php foreach($actions as $controller => $array_action): ?>
<div class="col-md-4">

    <div class="card">
        <div class="card-header">
            <?= ucwords($controller) ?>
        </div>

        <div class="card-body">
            <ul>
                <?php foreach($array_action as $action): ?>
                    <li> <?=  $action ?> </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<?php endforeach; ?>

</div>