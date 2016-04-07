<?php extract($d); ?>
<li data-editor='<?php echo $id ?>'>
    <?php editor::btn_close($id); ?>
    <a href="#editor-<?php echo $d['id'] ?>" class="btn-trigger ext-me pull-left" data-file="<?php echo basename($file); ?>" data-id="<?php echo $id; ?>" title="<?php echo $file; ?>" data-rel="<?php echo $file; ?>" data-cb="setEditor" data-alt="<?php $c->urlExec('app','sh-dir',["dir"=>$file]); ?>"><?php echo basename($file); ?></a>

    <?php $info = pathinfo($file); ?>

<a href="<?php $c->urlExec('editor','edit',['file'=>$info['basename'],'dir'=>$info['dirname'],'autopen'=>'true','key'=>$id]) ?>" class="btn-f-edit hide" data-ext="<?php echo $info['extension']; ?>"></a>

    <div class="clearfix"></div>
</li>