<div class="nav-item ">
<a id="editorSave-<?php echo $s['id'] ?? 1 ?>" href="#" class="btn-cb btn editorSave" data-cb="editorSave" data-cb-app="editor" title="save"><i class="fa fa-floppy-o"></i></a>
<a id="editorStar-<?php echo $s['id'] ?? 1 ?>" href="<?php $c->urlExec('editor','star') ?>" class="btn-cm btn editorStar" title="star"  data-cb="starsRefresh" data-cb-app="editor"><i class="fa fa-star"></i></a>
</div>
<div class="nav-item pull-right">

<input type="hidden" class="fileOpen open" value="" />
</div>
<ul class="nav nav-tabs nav-tabs-editor" id="filesTabs-<?php echo $s['id'] ?? 1 ?>">
</ul>