<?php $c->uploader($_GET['dir']); ?>

<form id="templates_files" data-cb="templatesFile" action="<?php $c->urlExec('editor','templates_files'); ?>" class="form-live form-templates form-inline">
<!-- <?php $c->twig('toto'); ?> -->

    <input type="hidden" name="dest" value="<?php echo $_GET['dir']; ?>">
    <div class="input-group">
        <input type="text" placeholder="" name="file" class="form-control autoclear autofocus" >
        </div>
        <div class="input-group">
        <select name="file_type" class="c-select form-control select2">
         <option value="folder">folder</option>
            <?php foreach ($d as $key => $value): ?>
                <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
            <?php endforeach ?>
               <!--  <option value="dir">folder</option>
                <option value="readme.md" >readme</option>
                <option value="php.php" selected="selected">php</option>
                <option value="controller.php">controller</option>
                <option value="upload.php">upload</option>
                <option value="index.php">index</option>
                <option value="exec.php">exec</option>
                <option value="view.php">view</option>
                <option value="js.js">js</option>
                <option value="json.json">json</option>
                <option value="style.less">less</option> -->
            </select></div>
            <button class="btn btn-success btn-sm" type="submit">Créer</button>

</form>