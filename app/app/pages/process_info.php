<?php $app = new app(); ?>
<?php $c->helper('Installation','Premiere phase d\'installation','1'); ?>
<div class="form-group">
    <div class="input-group">
          <div id="clipme1" class="form-control sm-2">
          symfony new <?php echo $_GET['name'] ?><br>
          cd <?php echo $_GET['name'] ?> <br>
          curl https://getcomposer.org/composer.phar > composer.phar<br>
          php composer.phar require doctrine/doctrine-fixtures-bundle "@dev"<br>
          php composer.phar require friendsofsymfony/user-bundle "~2.0@dev"<br>
          php composer.phar require friendsofsymfony/jsrouting-bundle "^1.5"<br>
          php composer.phar require coresphere/console-bundle "@dev"<br>
          php composer.phar require rodbox/rodboxcore "@dev"<br>
          php composer.phar require rodbox/rodboxbower "@dev"<br>
          php composer.phar require rodbox/rodboxtrans "@dev"<br>
          php composer.phar require rodbox/rodboxfront "@dev"<br>
          php composer.phar require rodbox/rodboxuser "@dev"<br>
          php composer.phar require rodbox/rodboxadmin "@dev"<br>
          php composer.phar require rodbox/rodboxblog "@dev"<br>

          php composer.phar require rodbox/rodboxdev "@dev"<br>

          php bin/console generate:bundle --namespace=APP/FrontBundle --bundle-name=FrontBundle --format=annotation<br>

          php bin/console cache:clear<br>
         </div>
          <span class="input-group-btn">
            <?php $c->clipme('clipme1'); ?>
          </span>
    </div>
</div><div class="form-group">
    <?php $c->clipme('clipme2','php bin/console generate:bundle --namespace=APP/AdminBundle --bundle-name=AdminBundle --format=annotation<br>'); ?>
</div>

<div class="form-group">
<?php $c->helper('Nettoyage des éléments de démo et installation des paramétrages des require de composer','Nettoyage des éléments de démo','2'); ?>
<a href="<?php $c->urlExec('app','clean_symfony') ?>" class="btn btn-primary btn-sm btn-exec" title="title">clean</a>
</div>

<?php $c->helper('Ne pas oublier de déplacer la ligne d\' include dans le fichier config','Installation des éléments bower','3'); ?>
<div class="form-group">
<?php
  $content = "bower install jquery<br>
  bower install bootstrap#v4.0.0-alpha.2<br>
  bower install select2<br>
  bower install https://github.com/moxiecode/plupload.git<br>
  bower install font-awesome<br>
  bower install html.sortable --save<br>
  ";
$c->clipme('clipme3', $content);
?>
</div>

<div class="form-group">
<?php $c->helper('Indexation des fichiers vendors','Index','4'); ?>
<a href="<?php $c->urlExec('editor','bundles_index') ?>" class="btn btn-primary btn-sm btn-exec" title="title">index</a></div>

<div class="form-group">
<?php $c->helper('Overide','Overide','5'); ?>
<a href="<?php $c->urlExec('editor','bundles_overides',['bundles'=>['FOSUserBundle','RBFrontBundle']]) ?>" class="btn btn-primary btn-sm btn-exec" title="title">Overide front</a>
</div>
<div class="form-group">
<?php $c->helper('Bower','Base de donnée','6'); ?>
<a href="<?php $c->urlExec('app','sublime'); ?>" id="paramproject" data-cb="refresh" class="btn btn-primary" title="Ouvrir" >Ouvrir</a>
</div>