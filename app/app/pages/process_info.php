<?php $app = new app(); ?>
<?php $c->helper('Installation','Premiere phase d\'installation','1'); ?>
<div class="form-group">
    <div class="input-group">
          <div id="clipme1" class="form-control sm-2">
          symfony new <?php echo $_GET['name'] ?><br>
          cd <?php echo $_GET['name'] ?> <br>
          <?php echo PROCESS[0] ?>
          </div>
          <span class="input-group-btn">
            <?php $c->clipme('clipme1'); ?>
          </span>
    </div>
</div><div class="form-group">
<div id="clipme2" class="form-control sm-2">
<?php echo PROCESS[1] ?>
</div>
    <?php $c->clipme('clipme2'); ?>
</div>

<div class="form-group">
<?php $c->helper('Nettoyage des éléments de démo et installation des paramétrages des require de composer','Nettoyage des éléments de démo','2'); ?>
<a href="<?php $c->urlExec('app','clean_symfony') ?>" class="btn btn-primary btn-sm btn-exec" title="title">clean</a>
</div>

<?php $c->helper('Ne pas oublier de déplacer la ligne d\' include dans le fichier config','Installation des éléments bower','3'); ?>
<div class="form-group">
<?php
$c->clipme('clipme3', PROCESS[2]);
?>
</div>

<div class="form-group">
<?php $c->helper('Indexation des fichiers vendors','Index','4'); ?>
<a href="<?php $c->urlExec('editor','bundles_index') ?>" class="btn btn-primary btn-sm btn-exec" title="title">index</a></div>

<div class="form-group">
<?php $c->helper('Overide','Overide','5'); ?>
<a href="<?php $c->urlExec('editor','bundles_overides',['bundles'=>['FOSUserBundle','RBFrontBundle']]) ?>" class="btn btn-primary btn-sm btn-exec" title="title">Overide front</a>
</div>
<div class="alert">
  <p>Penser a surcharger les controllers des Bundles Admin et Front </p>
</div>
<div class="form-group">
<?php $c->helper('Bower','Base de donnée','6'); ?>
<a href="<?php $c->urlExec('app','sublime'); ?>" id="paramproject" data-cb="refresh" class="btn btn-primary" title="Ouvrir" >Ouvrir</a>
</div>