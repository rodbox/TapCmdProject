<hr>
<?php $c->helper('Selectionner les fichiers à surchargés','Selection','3'); ?>
<!-- BEGIN NAVTABS : titleTabs  -->
<ul class="nav nav-tabs" id="titleTabs">
    <li class="nav-item ">
        <a class="nav-link active" data-toggle="tab" href="#titleTabs-tab-3" aria-expanded="true">Infos</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link " data-toggle="tab" href="#titleTabs-tab-1" aria-expanded="false">Fichiers d'origines</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link " data-toggle="tab" href="#titleTabs-tab-2" aria-expanded="false">Fichiers d'archives</a>
    </li>
</ul>
<!-- END NAVTABS : titleTabs  -->
<!-- BEGIN TABSCONTENT  -->
<div class="tab-content">
    <!-- TABS 1  -->
    <div id="titleTabs-tab-1" class="tab-pane ">

        <div class="form-group">
            <label for="overide_controller">Controller</label>
            <select id="overide_controller" name="overide[controllers][]" data-cb-app="editor" data-cb-change="loadOverideArchive" class="on-change c-select form-control select2" multiple="true">
                <?php foreach ($d['bundle']['controllers'] as $key => $controller): ?>
                    <option value="<?php echo $controller; ?>">
                        <?php echo $controller; ?>
                    </option>
                <?php endforeach ?>
        </select>

        <a href="<?php $c->urlPage('app','preview',['dir'=>DIR_PROJECT.'/'.$_SESSION['project']['name'].'/'.$d['bundle']['dir'].'/Controller']) ?>" class="btn btn-primary btn-sm btn-modal btn-preview" data-src="#overide_controller" data-modal="modalLg2" title="Preview"><i class="fa fa-eye"></i></a>
        </div>

        <div class="form-group">
            <label for="overide_views">Views</label>
            <select id="overide_views" name="overide[views][]" data-cb-app="editor" data-cb-change="loadOverideArchive" class="on-change c-select form-control select2" multiple="true">
                <?php foreach ($d['bundle']['views'] as $key => $views): ?>
                    <option value="<?php echo $views; ?>">
                        <?php echo $views; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="overide_entitys">Entitys</label>
            <select id="overide_entitys" name="overide[entitys][]" data-cb-app="editor" data-cb-change="loadOverideArchive" class="on-change c-select form-control select2" multiple="true">
                <?php foreach ($d['bundle']['entitys'] as $key => $entitys): ?>
                    <option value="<?php echo $entitys; ?>">
                        <?php echo $entitys; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="overide_events">Event</label>
            <select id="overide_events" name="overide[events][]" data-cb-app="editor" data-cb-change="loadOverideArchive" class="on-change c-select form-control select2" multiple="true">
                <?php foreach ($d['bundle']['events'] as $key => $events): ?>
                    <option value="<?php echo $events; ?>">
                        <?php echo $events; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <label for="overide_forms">Form</label>
            <select id="overide_forms" name="overide[forms][]" data-cb-app="editor" data-cb-change="loadOverideArchive" class="on-change c-select form-control select2" multiple="true">
                <?php foreach ($d['bundle']['forms'] as $key => $forms): ?>
                    <option value="<?php echo $forms; ?>">
                        <?php echo $forms; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="overide_listeners">Listeners</label>
            <select id="overide_listeners" name="overide[listeners][]" data-cb-app="editor" class="c-select form-control select2" multiple="true">
                <?php foreach ($d['bundle']['listeners'] as $key => $listeners): ?>
                    <option value="<?php echo $listeners; ?>">
                        <?php echo $listeners; ?>
                    </option>
                <?php endforeach ?>
        </select>       </div>

        </div>
    <!-- END TABS 1  -->

    <div id="titleTabs-tab-2" class="tab-pane ">
    <!-- BEGIN NAVTABS : titleTabs  -->
       <ul class="nav nav-tabs" id="titleTabsArchives">
       <?php foreach ($d['archivesSrc'] as $key => $value): ?>
           <li class="nav-item ">
               <a class="nav-link" data-toggle="tab" href="#titleTabsArchives-tab-<?php echo $value; ?>" aria-expanded="true"><?php echo $value; ?></a>
           </li>
       <?php endforeach ?>
       </ul>
       <!-- NAVTABS : titleTabsArchives  -->

       <div class="tab-content">
           <!-- TABS 1  -->
           <?php foreach ($d['archivesSrc'] as $key => $value): ?>
           <div id="titleTabsArchives-tab-<?php echo $value; ?>" class="tab-pane ">
           <select id="overide_archives" name="overide[archives][<?php echo $value ?>][]" class="c-select form-control select2" multiple='true'>
                <?php foreach ($d['archives']->files() as $keyA => $valueA): ?>
<option value="<?php echo $valueA->getRealPath() ?>"><?php echo str_replace($value.'/','',$valueA->getRelativePathname()); ?></option>
                <?php endforeach ?>     </select>
           </div>
       <?php endforeach ?>
       </div>
       <!-- END TABSCONTENT  -->
       <!-- END NAVTABS titleTabsArchives -->

    </div>

    <!-- TABS 3  -->
    <div id="titleTabs-tab-3" class="tab-pane active">
    <?php $c->getMd($d['bundle']['readme']); ?>
    </div>
    <!-- END TABS 3  -->

</div>
<!-- END TABSCONTENT  -->
<!-- END NAVTABS titleTabs -->
<hr>
<?php $c->helper('Valider et n\'oubliez pas de modifier la configuration','Enregistrer + Configurer','4'); ?>
<button id="" class="btn btn-success" type="Submit" aria-pressed="false">Overide</button>
<!-- NAVTABS : titleTabs  -->
