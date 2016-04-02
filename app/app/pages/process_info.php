<?php $app = new app(); ?>
<?php $c->helper('Installation','Premiere phase d\'installation','1'); ?>
<div class="form-group">
    <div class="input-group">
          <span class="input-group-addon">1</span>
          <div id="clipme1" class="form-control small">
          symfony new <?php echo $_GET['name'] ?><br>
          cd <?php echo $_GET['name'] ?> <br>
          curl https://getcomposer.org/composer.phar > composer.phar<br>
          php composer.phar require rodbox/rodboxfront "@dev"<br>
          php composer.phar require rodbox/rodboxuser "@dev"<br>
          php composer.phar require rodbox/rodboxblog "@dev"<br>
          php composer.phar require friendsofsymfony/user-bundle "~2.0@dev"<br>
          php composer.phar update<br>
          php bin/console cache:clear<br>
         </div>
          <span class="input-group-btn">
            <?php $c->clipme('clipme1'); ?>
          </span>
    </div>
</div>
<?php $c->helper('Nettoyage','Nettoyage des éléments de démo','2'); ?>
<a href="<?php $c->urlExec('app','clean_symfony') ?>" class="btn btn-primary btn-sm btn-exec" title="title">clean</a>

<?php $c->helper('Bower','Installation des éléments bower','3'); ?>
<div class="form-group">
    <div class="input-group">
          <span class="input-group-addon">3</span>
          <div id="clipme2" class="form-control small">bower install jquery<br>
          bower install bootstrap<br>
         </div>
          <span class="input-group-btn">
            <?php $c->clipme('clipme2'); ?>
          </span>
    </div>
</div>
<?php $c->helper('Bower','Base de donnée','4'); ?>
<a href="#" class="btn-cb btn" data-cb="refresh">refre</a>