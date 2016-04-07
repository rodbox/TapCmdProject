<div class="list-group <?php echo $_GET['ext']; ?>">

  <!--   <a href="#" class="list-group-item only-src only-test"><i class="fa fa-angle-right"></i>
Dupliquer</a>
    <a href="#" class="list-group-item only-src only-test"><i class="fa fa-angle-right"></i>
Déplacer</a> -->
    <a href="<?php $c->urlExec('app','lessmaster',['file'=>$_GET['dir'].'/'.$_GET['file']]) ?>" class="list-group-item only-less btn-exec" title="LessMaster"><i class="fa fa-angle-right"></i>
 LessMaster</a>
 <a href="<?php $c->urlExec('app','assets_master',['file'=>$_GET['dir'].'/'.$_GET['file'],'ext'=>$_GET['ext']]) ?>" class="list-group-item only-public btn-exec" title="asset"><i class="fa fa-angle-right"></i>
 asset</a>

 <a href="<?php $c->urlExec('app','assets_master',['file'=>$_GET['dir'].'/'.$_GET['file'],'ext'=>$_GET['ext'],'type'=>'admin']) ?>" class="list-group-item only-public btn-exec" title="asset"><i class="fa fa-angle-right"></i>
 asset admin</a>

 <a href="<?php $c->urlPage('app','img',['img'=>$_GET['dir'].'/'.$_GET['file']]) ?>" class="list-group-item only-png only-jpg btn-modal" title="Color" data-name="fefe" data-modal="modalLg"><i class="fa fa-angle-right"></i>
 Color Dominante</a>
 <a href="<?php $c->urlExec('editor','overide_archive',['file'=>$_GET['dir'].'/'.$_GET['file']]) ?>" class="list-group-item only-src btn-exec" title="LessMaster"><i class="fa fa-angle-right"></i>
 Archiver</a>
</div>
<div class="clearfix"></div>