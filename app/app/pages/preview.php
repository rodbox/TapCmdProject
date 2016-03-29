<!-- NAVTABS : previews  -->
<!-- BEGIN NAVTABS : previews  -->
<ul class="nav nav-tabs" id="previews">
   <?php foreach (explode(',',$_GET["value"]) as $key => $value):?>
    <li class="nav-item ">
        <a class="nav-link " data-toggle="tab" href="#previews-tab-<?php echo $key; ?>" aria-expanded="false"><?php echo $value; ?></a>
    </li>
<?php endforeach;?>
</ul>
<!-- END NAVTABS : previews  -->
<!-- BEGIN TABSCONTENT  -->
<div class="tab-content">
<?php foreach (explode(',',$_GET["value"]) as $key => $value):?>
     <!-- TABS<?php echo $key; ?>   -->
    <div id="previews-tab-<?php echo $key; ?>" class="tab-pane ">
     <pre>
        <code>
            <?php echo file_get_contents($_GET["dir"].'/'.$value); ?>
        </code>
    </pre>
    </div>
    <!-- END TABS <?php echo $key; ?>   -->

<?php endforeach;?>



</div>
<!-- END TABSCONTENT  -->
<!-- END NAVTABS previews -->