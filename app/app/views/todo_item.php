<?php foreach ($d as $key => $todo): ?>
    <div id="todo_<?php echo $key ?>" class="list-group-item <?php if ($todo['status']=='true'): ?>
      todo-checked
    <?php endif ?>">
        <!-- BEGIN COL : col-md-1 col-lg-1  -->
        <div class="col-md-1 col-lg-1 ">
             <div class="btn-group">
        <a href="<?php $c->urlExec('app','todo_check',['k'=>$key,'name'=>$_GET['name']]) ?>" class="btn btn-sm btn-exec btn-check" title="Supprimer" data-cb='todo_check' data-target='#todo_<?php echo $key ?>'><i class="fa fa-check"></i></a>
        <a href="<?php $c->urlExec('app','todo_del',['k'=>$key,'name'=>$_GET['name']]) ?>" class="btn btn-sm btn-exec btn-del" data-confirm="Supprimer ?" title="Supprimer" data-cb='todo_del' data-target='#todo_<?php echo $key ?>'><i class="fa fa-remove"></i></a>
        </div>
        </div>
        <!-- END COL : col-md-1 col-lg-1  -->
        <!-- BEGIN COL : col-md-11 col-lg-11  -->
        <div class="col-md-11 col-lg-11 ">
            <?php echo $todo['msg']; ?>
        <div class="text-muted"><?php echo date('d M Y H:i:s', $todo['date'] ?? ''); ?></div>
        </div>
        <!-- END COL : col-md-11 col-lg-11  -->
        <div class="clearfix"></div>
    </div>
<?php endforeach ?>