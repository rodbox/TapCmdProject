<form id="form-run" action="#" class="form-live form-inline">
    <div id="app-content" class="container">
        <!-- BEGIN COL : col-md-6 col-lg-6  -->
        <div class="col-md-12 col-xs-12">
            <div class="btn-list row">
                <?php foreach (CMDS as $cmd => $cmdMeta): ?>
                <div class="col-xs-4 col-lg-2 col-md-3">
                <a href="<?php $c->urlExec('app','run',[
                    'cmd'=>$cmdMeta
                ]); ?>" class="btn btn-box btn-cmd" data-src="#form-run" data-cmd="<?php echo $cmdMeta; ?>" data-target="#result-<?php echo $cmd; ?>"><?php echo $cmdMeta; ?></a>
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-md-12 col-xs-12">
            <!-- BEGIN NAVTABS : result  -->
            <ul class="nav nav-tabs" id="result">

                <?php foreach (CMDS as $cmd => $cmdMeta): ?>
                <li class="nav-item">
                    <a data-toggle="tab" href="#result-tab-<?php echo $cmd ?>" aria-expanded="<?php echo ($cmd =='0')?'true':''; ?>" class="nav-link <?php echo ($cmd == 0)?'active':''; ?> cmd-item cmd-item-<?php echo $cmdMeta; ?>"><?php echo $cmdMeta; ?></a>
                </li>
                <?php endforeach ?>
            </ul>
            <!-- END NAVTABS : result  -->
            <!-- BEGIN TABSCONTENT  -->
            <div class="tab-content">

                <?php foreach (CMDS as $cmd => $cmdMeta): ?>
                <div id="result-tab-<?php echo $cmd ?>" class="tab-pane <?php echo ($cmd == 0)?'active':''; ?> cmd-item cmd-item-<?php echo $cmdMeta; ?>">
                    <pre><code id="result-<?php echo $cmd; ?>"></code></pre>
                </div>
                <?php endforeach ?>
            </div>
            <!-- END TABSCONTENT result -->


        </div>
    </div>
</form>
