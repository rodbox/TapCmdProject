<!-- BEGIN NAVTABS : result  -->
<ul class="nav nav-tabs" id="result">
   <!--  <li class="nav-item">
        <a data-toggle="tab" href="#result-tab-console" aria-expanded="true"  class="nav-link active"><i class="fa fa-code"></i></a>
    </li> -->
    <?php foreach ($d as $cmd => $cmdMeta): ?>
    <li class="nav-item">
        <a data-toggle="tab" href="#result-tab-<?php echo $cmd ?>" aria-expanded="false" class="nav-link cmd-item cmd-item-<?php echo $cmdMeta; ?>"><?php echo $cmdMeta; ?></a>
    </li>
    <?php endforeach ?>

</ul>
<!-- END NAVTABS : result  -->
<!-- BEGIN TABSCONTENT  -->
<div class="tab-content">
    <?php foreach ($d as $cmd => $cmdMeta): ?>
    <div id="result-tab-<?php echo $cmd ?>" class="tab-pane  cmd-item cmd-item-<?php echo $cmdMeta; ?>">
    <pre><code id="result-<?php echo $cmd; ?>"></code></pre>
    </div>
<?php endforeach ?>
  <!--   <div id="result-tab-console" class="tab-pane active">
        <iframe id="console" src="http://localhost:8000/_console/_console">
        </iframe>
    </div> -->
</div>
<!-- END TABSCONTENT result -->


