<div class="checkdown checkdown-success">
    <?php
    $c->btn_combo(
        "<i class='fa fa-cloud-upload'></i> Upload",
        [
            ['app','copy'],
            ['app','dist'],
            ['app','zip'],
            ['app','upl']
        ],
        '#form-project',
        '',
        'checkdown-btn'
    );
    ?>
    <div class="checkdown-list">
        <label class="checkdown-item">
            <input name="filters[]" type="checkbox"  checked="checked" value="/web/assets">
            <span class="checkdown-label">assets</span>
        </label>
        <label class="checkdown-item">
            <input name="filters[]" type="checkbox"  checked="checked" value="/bin">
            <span class="checkdown-label">bin</span>
        </label>
        <label class="checkdown-item">
            <input name="filters[]" type="checkbox"  checked="checked" value="/web/bundles">
            <span class="checkdown-label">bundles</span>
        </label>
        <label class="checkdown-item">
            <input name="filters[]" type="checkbox"  checked="checked" value="/composer.phar">
            <span class="checkdown-label">composer</span>
        </label>
        <label class="checkdown-item">
            <input name="filters[]" type="checkbox"  checked="checked" value="/var">
            <span class="checkdown-label">var</span>
        </label>
        <label class="checkdown-item">
            <input name="filters[]" type="checkbox"  checked="checked" value="/vendor">
            <span class="checkdown-label">vendor</span>
        </label>
    </div>
</div>