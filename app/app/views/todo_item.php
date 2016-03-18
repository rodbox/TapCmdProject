<?php foreach ($d as $key => $todo): ?>
    <div id="todo_<?php echo $key ?>" class="list-group-item <?php if ($todo['status']=='true'): ?>
      todo-checked
    <?php endif ?>">

        <div class="btn-group">
        <a href="<?php $c->urlExec('app','todo_check',['k'=>$key,'name'=>$_GET['name']]) ?>" class="btn btn-sm btn-exec btn-check" title="Supprimer" data-cb='todo_check' data-target='#todo_<?php echo $key ?>'><i class="fa fa-check"></i></a>
        <a href="<?php $c->urlExec('app','todo_del',['k'=>$key,'name'=>$_GET['name']]) ?>" class="btn btn-sm btn-exec btn-del" data-confirm="Supprimer ?" title="Supprimer" data-cb='todo_del' data-target='#todo_<?php echo $key ?>'><i class="fa fa-remove"></i></a>
        </div>
        <?php echo $todo['msg']; ?>
        <div class="pull-right text-muted"><?php echo date('d M Y H:i:s', $todo['date'] ?? ''); ?></div>
    </div>
<?php endforeach ?>