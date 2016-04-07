<form id="formoride" action="<?php $c->urlExec('editor','overide'); ?>" class="form-exec form-live" data-cb="default">
    <div class="alert alert-warning">
    <ul>
        <li><p>Si le champ src est vide la surcharge s'install dans le dossier app/Ressources du projet.</p></li>
        <li><p>Ne pas oublier de modifier les namespaces pour les fichiers surcharger. (voir la documentation)</p></li>
        <li><p>Ne pas oublier d'indexer les bundles avant de selectionner la surcharge.</p></li>
    </ul>
        <hr>
        <a href="https://symfony.com/doc/current/cookbook/bundles/inheritance.html" class="btn btn-warning-outline btn-popup" target="blank" data-popup="default" data-cb="false" >Documentation</a>
    </div>
    <?php $c->view("editor","bundles","bundles"); ?>
</form>
<div class="clearfix"></div>
