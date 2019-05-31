
<tbody>
    <?php foreach($records as $egift): ?>
        <tr>
            <td>
                <div class="checkbox">
                    <label>
                        <input class="included-egifts" type="checkbox" name="Promo[included_egift][]" value="<?= $egift->id ?>" <?= in_array($egift->id, isset($model->_included_egift)? $model->_included_egift: [])? 'checked': '' ?> >
                        <?= ucwords($egift->name) ?>
                    </label>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
