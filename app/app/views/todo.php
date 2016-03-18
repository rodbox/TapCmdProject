<div class="form-group">
   <form id="form-todo" class="form-live" action="<?php $c->urlExec('app','todo',['name'=>$_GET['name']]) ?>" data-cb='todo_new'>
                  <input type="text" class="form-control" name="todo[msg]" placeholder="Task" />
        </form>
</div>
<div class="list-group">
    <div id="todo-list">
      <?php $c->view("app","todo_item",$d); ?>
    </div>
</div>