<?php $app = new app();
$cur =  $app->cur();
 ?>
 <div class="projects">
    <?php foreach ($d as $key => $project): ?>
    <a href="<?php $c->urlExec('app','project',['name'=>$project]) ?>" class="btn btn-primary btn-project btn-sm <?php if ($project == $cur): ?> active <?php endif ?>"><?php echo $project; ?></a>
    <?php endforeach ?>
</div>