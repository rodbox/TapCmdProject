<!-- form :create  -->
<form id="create"  action="<?php $c->urlExec('app','create') ?>" class=" form-live" >


<!-- input : name -->
<div class="form-group row">
    <label for="name" class="col-sm-2 form-control-label">Nom de projet</label>
    <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nom de projet" />
    </div>
</div>
<!-- end input : name -->

<hr>

<button type="submit" class="btn btn-success">Envoyer</button>
</form>
<!-- form : create -->