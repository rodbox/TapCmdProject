<form id="files_search" data-cb="input_files" action="<?php $c->urlExec('editor','files_search'); ?>" class="form-live form-files">
    <div class="input-group">
        <input type="text" id="file_project" placeholder="" data-target="#files_search" name="file" class="form-control on-focusin on-focusout on-keyup" data-cb-app="editor" data-cb-focusin="fileSearchOn" data-cb-focusout="fileSearchOff" data-cb-keyup="fileSearch">
        <span class="input-group-btn" style="max-width: 48px !important;">
            <a href="<?php $c->urlExec('editor','files_index') ?>" class="btn btn-default btn-exec" title="title"><i class="fa fa-search"></i></a>
        </span>
    </div>
</form>