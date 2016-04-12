<div class="list-group <?php echo $_GET['ext']; ?>" data-file="<?php echo $_GET['file']; ?>">

  <!--   <a href="#" class="list-group-item only-src only-test"><i class="fa fa-angle-right"></i>
Dupliquer</a>
    <a href="#" class="list-group-item only-src only-test"><i class="fa fa-angle-right"></i>
Déplacer</a> -->
    <a href="<?php $c->urlExec('app','lessmaster',['file'=>$_GET['dir'].'/'.$_GET['file']]) ?>" class="list-group-item only-less btn-exec" title="LessMaster"><i class="fa fa-angle-right"></i>
 LessMaster</a>
 <a href="<?php $c->urlExec('app','assets_master',['file'=>$_GET['dir'].'/'.$_GET['file'],'ext'=>$_GET['ext']]) ?>" class="list-group-item only-asset only-public btn-exec" title="asset"><i class="fa fa-angle-right"></i>
 Asset</a>

 <a href="<?php $c->urlExec('app','assets_master',['file'=>$_GET['dir'].'/'.$_GET['file'],'ext'=>$_GET['ext'],'type'=>'admin']) ?>" class="list-group-item only-asset only-public btn-exec" title="asset"><i class="fa fa-angle-right"></i>
 Asset admin</a>

 <a href="<?php $c->urlPage('app','img',['img'=>$_GET['dir'].'/'.$_GET['file']]) ?>" class="list-group-item only-img btn-modal" title="Color" data-name="fefe" data-modal="modalLg"><i class="fa fa-angle-right"></i>
 Color Dominante</a>
 <a href="<?php $c->urlExec('editor','overide_archive',['file'=>$_GET['dir'].'/'.$_GET['file']]) ?>" class="list-group-item only-src btn-exec" title="LessMaster"><i class="fa fa-angle-right"></i>
 Archiver</a>

<form action="<?php $c->urlExec('editor','bundle_overide',['file'=>$_GET['dir'].'/'.$_GET['file']]) ?>" class="only-bundle form-live">
<?php $c->view("editor","vendor","bundles"); ?>
 <button type="submit" class="list-group-item " title="Overide"><i class="fa fa-angle-right"></i>
 Overide</button>
 </form>
</div>
<div class="clearfix"></div>