<!-- form :create  -->
<form id="create"  action="<?php $c->urlExec('app','create') ?>" class=" form-live" >


<!-- input : name -->
<div class="row">
    <label for="name" class="col-sm-3 form-control-label">Nom de projet </label>
    <div class="col-sm-7">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nom de projet" />
    </div>
    <div class="col-sm-1"><?php $c->helper('Nom du projet'); ?></div>
</div>
<!-- end input : name -->
<fieldset class="row">
<label for="" class="col-sm-3 form-control-label">Type</label>
<div class="col-sm-7">

<div class="btn-group">
    <label for="type_sf" class="btn btn-secondary">Symfony
        <input type="radio" name="type" class="form-control" required="required" id="type_sf" value="Symfony" />
        </label>
    <label for="type_rb" class="btn btn-secondary">Rodbox
        <input type="radio" name="type" class="form-control" required="required" id="type_rb" value="Rodbox" />
        </label>
</div>
</div>
<!-- end input : type -->

<label for="description" class="col-sm-3 form-control-label">Description</label>
<div class="col-sm-7">
    <textarea id="description" class="form-control" name="description" data-tab="true"></textarea>
    </div>
</fieldset>

<hr>

<button type="submit" class="btn btn-success">Envoyer</button>
</form>
<!-- form : create -->