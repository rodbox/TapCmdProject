<!-- BEGIN NAVTABS : req  -->
<ul class="nav nav-tabs" id="req">
    <li class="nav-item ">
        <a class="nav-link active" data-toggle="tab" href="#req-tab-3" aria-expanded="true">assets</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link " data-toggle="tab" href="#req-tab-1" aria-expanded="false">Composer</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#req-tab-2" aria-expanded="false">Bower </a>
    </li>
</ul>
<!-- END NAVTABS : req  -->
<!-- BEGIN TABSCONTENT  -->
<div class="tab-content">
    <!-- TABS 1  -->
    <div id="req-tab-1" class="tab-pane ">
        <textarea name="composer" class="form-control" rows="10" data-tab="true"><?php echo $d['composer'] ?? ''; ?></textarea>
    </div>
    <!-- END TABS 1  -->
    <!-- TABS 2  -->
    <div id="req-tab-2" class="tab-pane">
        <textarea name="bower" class="form-control" rows="10" data-tab="true"><?php echo $d['bower'] ?? ''; ?></textarea>
    </div>
    <!-- END TABS 2  -->
    <!-- TABS 3  -->
    <div id="req-tab-3" class="tab-pane active">
    <?php $c->helper('La selection ce fait depuis le menu contextuel du fichier.'); ?>
<!--      /**
        * TODO : gestion des assets (supprimer, compiler, minifier)
        **/ -->

            <?php $c->arrayInput($d['assets'],'assets') ?>
    </div>
    <!-- END TABS 3  -->
</div>
<!-- END TABSCONTENT  -->
<!-- END NAVTABS req