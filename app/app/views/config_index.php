<form action="<?php $c->urlExec('app', 'config') ?>" id="form-config" class="form-live">

<input type="hidden" name="name" class="form-control" id="name"  value="<?php echo $d['name']; ?>">

 <!-- BEGIN NAVTABS : conf  -->
 <ul class="nav nav-tabs" id="conf">
     <li class="nav-item ">
         <a class="nav-link active" data-toggle="tab" href="#conf-tab-0" aria-expanded="true">Recap</a>
     </li>
     <li class="nav-item ">
         <a class="nav-link " data-toggle="tab" href="#conf-tab-1" aria-expanded="false">FTP</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#conf-tab-2" aria-expanded="false">Mail</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#conf-tab-3" aria-expanded="false">Database</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#conf-tab-4" aria-expanded="false">Setting</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#conf-tab-5" aria-expanded="false">Fichiers</a>
     </li><li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#conf-tab-6" aria-expanded="false">Infos</a>
     </li>
 </ul>
 <!-- END NAVTABS : conf  -->
 <!-- BEGIN TABSCONTENT  -->
 <div class="tab-content">
     <div id="conf-tab-0" class="tab-pane active">
        <?php $c->view('app', 'config_recap', $d) ?>
     </div>
     <div id="conf-tab-1" class="tab-pane ">
        <?php $c->view('app', 'config_ftp', $d) ?>
     </div>
     <div id="conf-tab-2" class="tab-pane">
        <?php $c->view('app', 'config_mail', $d) ?>
     </div>
     <div id="conf-tab-3" class="tab-pane">
        <?php $c->view('app', 'config_db', $d) ?>
     </div>
     <div id="conf-tab-4" class="tab-pane">
        <?php $c->view('app', 'config_setting', $d) ?>
     </div>
     <div id="conf-tab-5" class="tab-pane">
        <?php $c->view('app', 'config_file', $d) ?>
     </div>
     <div id="conf-tab-6" class="tab-pane">
        <?php $c->view('app', 'config_info', $d) ?>
     </div>
 </div>
 <!-- END TABSCONTENT conf -->
<hr>
    <div class="text-right">
    <button class="btn btn-success" type="submit" aria-pressed="false">Enregistrer</button>
    </div>
 </form>