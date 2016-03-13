<!-- form :form-ftp  -->
<form id="form-ftp"  action="<?php $c->urlExec('app','ftp'); ?>" class=" form-live" >

<input type="hidden" name="project" value="<?php echo $_GET['project']; ?>">
<div>exclude</div>
<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary  ">
    <input name="filters[]" value="vendor" type="checkbox" > vendor
  </label>
  <label class="btn btn-primary ">
    <input name="filters[]" value="web/assets" type="checkbox" > web/assets
  </label>
  <label class="btn btn-primary ">
    <input name="filters[]" value="web/bundles" type="checkbox" > web/bundles
  </label>
  <label class="btn btn-primary ">
    <input name="filters[]" value="var" type="checkbox" > var
  </label>
</div>

<div> </div>
<a href="" class="btn-box"></a>
<a href="<?php $c->urlExec('app','copy') ?>" class="btn btn-default btn-exec" data-form="#form-ftp" title="copy">copy</a>
<a href="<?php $c->urlExec('app','dist') ?>" class="btn btn-default btn-exec" data-form="#form-ftp" title="dist">dist</a>
<a href="<?php $c->urlExec('app','zip') ?>" class="btn btn-default btn-exec" data-form="#form-ftp" title="zip">zip</a>
<a href="<?php $c->urlExec('app','upl') ?>" class="btn btn-default btn-exec" data-form="#form-ftp" title="upl">upl</a>
<a href="<?php $c->urlExec('app','unzip') ?>" class="btn btn-default btn-exec" data-form="#form-ftp" title="unzip">unzip</a>

<hr>

<button type="submit" class="btn btn-success">Envoyer</button>
</form>
<!-- form : form-ftp -->