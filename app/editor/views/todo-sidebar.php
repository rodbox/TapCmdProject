<div id="collapse_filesTodo">
<ul id="filesTodo" class="files ">
<?php $app = new app();
$dir = $app->dirProject().'/src'; ?>
    <?php foreach ($d['todo']['files'] ?? [] as $key => $file): ?>
        <li>
            <?php foreach ($file as $keyTask => $task): ?>
                <a href="<?php $c->urlExec('editor','edit',[
                'file' => $key,
                'dir'  => $dir.'/'.dirname($key)
                ]); ?>" class="btn-f-edit btn-todo ext-me " data-rel="<?php echo $dir.'/'.$key ?>" data-file="<?php echo basename($key); ?>" title="<?php echo $key; ?>" data-cb="setEditor" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$dir]); ?>"><?php echo $task['todo']; ?>
                <div>
                    <span class="small text-muted"><?php echo basename($key); ?></span>
                    <span class="small text-muted pull-right"><?php echo $task['line']; ?></span>
                </div>
                </a>
            <?php endforeach ?>


            <div class="clearfix"></div>
        </li>
    <?php endforeach ?>
</ul></div>