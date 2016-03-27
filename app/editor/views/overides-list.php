<hr>
<button id="" class="btn btn-success" type="Submit" aria-pressed="false">Overide</button>
<!-- NAVTABS : titleTabs  -->
<!-- BEGIN NAVTABS : titleTabs  -->
<ul class="nav nav-tabs" id="titleTabs">
    <li class="nav-item ">
        <a class="nav-link active" data-toggle="tab" href="#titleTabs-tab-3" aria-expanded="true">Infos</a>
    </li>
    <li class="nav-item ">
        <a class="nav-link " data-toggle="tab" href="#titleTabs-tab-1" aria-expanded="false">Fichiers</a>
    </li>
</ul>
<!-- END NAVTABS : titleTabs  -->
<!-- BEGIN TABSCONTENT  -->
<div class="tab-content">
    <!-- TABS 1  -->
    <div id="titleTabs-tab-1" class="tab-pane ">

        <div class="form-group">
            <label for="overide_controller">Controller</label>
            <select id="overide_controller" name="overide[controllers][]" class="c-select form-control select2" multiple="true">
                <?php foreach ($d['controllers'] as $key => $controller): ?>
                    <option value="<?php echo $controller; ?>">
                        <?php echo $controller; ?>
                    </option>
                <?php endforeach ?>
        </select>       </div>

        <div class="form-group">
            <label for="overide_views">Views</label>
            <select id="overide_views" name="overide[views][]" class="c-select form-control select2" multiple="true">
                <?php foreach ($d['views'] as $key => $views): ?>
                    <option value="<?php echo $views; ?>">
                        <?php echo $views; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="overide_entitys">Entitys</label>
            <select id="overide_entitys" name="overide[entitys][]" class="c-select form-control select2" multiple="true">
                <?php foreach ($d['entitys'] as $key => $entitys): ?>
                    <option value="<?php echo $entitys; ?>">
                        <?php echo $entitys; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="overide_events">Event</label>
            <select id="overide_events" name="overide[events][]" class="c-select form-control select2" multiple="true">
                <?php foreach ($d['events'] as $key => $events): ?>
                    <option value="<?php echo $events; ?>">
                        <?php echo $events; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="form-group">
            <label for="overide_forms">Form</label>
            <select id="overide_forms" name="overide[forms][]" class="c-select form-control select2" multiple="true">
                <?php foreach ($d['forms'] as $key => $forms): ?>
                    <option value="<?php echo $forms; ?>">
                        <?php echo $forms; ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <label for="overide_listeners">Listeners</label>
            <select id="overide_listeners" name="overide[listeners][]" class="c-select form-control select2" multiple="true">
                <?php foreach ($d['listeners'] as $key => $listeners): ?>
                    <option value="<?php echo $listeners; ?>">
                        <?php echo $listeners; ?>
                    </option>
                <?php endforeach ?>
        </select>       </div>

        </div>
    <!-- END TABS 1  -->


    <!-- TABS 3  -->
    <div id="titleTabs-tab-3" class="tab-pane active">
    <?php $c->getMd($d['readme']); ?>
    </div>
    <!-- END TABS 3  -->

</div>
<!-- END TABSCONTENT  -->
<!-- END NAVTABS titleTabs -->
