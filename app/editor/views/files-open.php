<?php extract($d); ?>
 <li data-editor='<?php echo $id ?>'>
            <?php editor::btn_close($id); ?>
            <a href="#editor-<?php echo $d['id'] ?>" class="btn-trigger c-5 ext-me pull-left" data-file="<?php echo basename($file); ?>" data-id="<?php echo $id; ?>" title="<?php echo $file; ?>" data-cb="setEditor" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$file]); ?>"><?php echo basename($file); ?></a>

            <div class="clearfix"></div>
        </li>