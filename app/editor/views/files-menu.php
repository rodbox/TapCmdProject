<form id="files_search" data-cb="input_files" action="<?php $c->urlExec('editor','files_search'); ?>" class="form-live form-files">
    <!-- BEGIN COL : col-md-8 col-lg-8  -->
    <div class="col-md-8 col-lg-8 col-md-offset-2">
        <div class="input-group">
        <span class="input-group-btn" style="max-width: 48px !important;">
            <a href="<?php $c->urlExec('editor','files_index') ?>" class="btn btn-default btn-exec" title="title"><i class="fa fa-search"></i></a>
        </span>
        <input type="text" id="file_project" autocomplete="off" data-target="#files_search" name="file" class="form-control on-focusin on-focusout on-keyup" data-cb-keyup="fileSearch" data-cb-app="editor" data-cb-focusin="fileSearchOn" data-cb-focusout="fileSearchOff" placeholder="Recherche..." >

    </div>
    </div>
    <!-- END COL : col-md-8 col-lg-8  -->
</form>
<div id="suggest">
</div>