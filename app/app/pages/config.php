<form action="<?php $c->urlExec('app','config') ?>" class="form-live">

<div class="form-group row">
        <label for="name" class="col-sm-3 form-control-label text-right">Nom</label>
        <div class="col-sm-9">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nom">
        </div>
    </div>

 <!-- BEGIN NAVTABS : conf  -->
 <ul class="nav nav-tabs" id="conf">
     <li class="nav-item ">
         <a class="nav-link active" data-toggle="tab" href="#conf-tab-1" aria-expanded="true">FTP</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#conf-tab-2" aria-expanded="false">Mail</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#conf-tab-3" aria-expanded="false">Database</a>
     </li>
 </ul>
 <!-- END NAVTABS : conf  -->
 <!-- BEGIN TABSCONTENT  -->
 <div class="tab-content">
     <div id="conf-tab-1" class="tab-pane active">
        <?php $c->view('app','config_ftp','config',['project'=>'']) ?>
     </div>
     <div id="conf-tab-2" class="tab-pane">
        <?php $c->view('app','config_mail','config',['project'=>'']) ?>
     </div>
     <div id="conf-tab-3" class="tab-pane">
        <?php $c->view('app','config_db','config',['project'=>'']) ?>
     </div>
 </div>
 <!-- END TABSCONTENT conf -->
<hr>
    <div class="text-right">
    <button class="btn btn-success" type="submit" aria-pressed="false">Enregistrer</button>
    </div>
 </form>