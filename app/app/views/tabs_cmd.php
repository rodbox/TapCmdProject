<!-- BEGIN NAVTABS : result  -->
<ul class="nav nav-tabs" id="result">
    <?php foreach ($d as $cmd => $cmdMeta): ?>
    <li class="nav-item">
        <a data-toggle="tab" href="#result-tab-<?php echo $cmd ?>" aria-expanded="<?php echo ($cmd =='0')?'true':''; ?>" class="nav-link <?php echo ($cmd == 0)?'active':''; ?> cmd-item cmd-item-<?php echo $cmdMeta; ?>"><?php echo $cmdMeta; ?></a>
    </li>
    <?php endforeach ?>
</ul>
<!-- END NAVTABS : result  -->
<!-- BEGIN TABSCONTENT  -->
<div class="tab-content">
    <?php foreach ($d as $cmd => $cmdMeta): ?>
    <div id="result-tab-<?php echo $cmd ?>" class="tab-pane <?php echo ($cmd == 0)?'active':''; ?> cmd-item cmd-item-<?php echo $cmdMeta; ?>">
    <pre><code id="result-<?php echo $cmd; ?>"></code></pre>
</div>
<?php endforeach ?>
</div>
<!-- END TABSCONTENT result -->