<div class="list-group <?php echo $_GET['ext']; ?>">

    <a href="#" class="list-group-item only-src only-test"><i class="fa fa-angle-right"></i>
Duplicate</a>
    <a href="#" class="list-group-item only-src only-test"><i class="fa fa-angle-right"></i>
Move</a>
    <a href="<?php $c->urlExec('app','lessmaster',['file'=>$_GET['dir'].'/'.$_GET['file']]) ?>" class="list-group-item only-less btn-exec" title="LessMaster"><i class="fa fa-angle-right"></i>
 LessMaster</a>
</div>
<div class="clearfix"></div>