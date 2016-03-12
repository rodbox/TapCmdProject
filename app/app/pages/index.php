<form id="form-run" action="#" class="form-live form-inline">
    <div id="app-content" class="container">
        <!-- BEGIN COL : col-md-6 col-lg-6  -->
        <div class="col-md-12 col-xs-12">
            <div class="btn-list row">
                <?php foreach (CMDS as $cmd => $cmdMeta): ?>
                <div class="col-xs-4 col-lg-2 col-md-3">
                <a href="<?php $c->urlExec('app','run',[
                    'cmd'=>$cmdMeta
                ]); ?>" class="btn btn-box btn-cmd" data-src="#form-run" data-cmd="<?php echo $cmdMeta; ?>"><?php echo $cmdMeta; ?></a>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    <div class="col-md-12 col-xs-12"><pre><code id="result"></code></pre></div></div>
</form>
