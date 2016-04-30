<div class="btn-group pull-right" >
     <a id="draw_ai" href="<?php $c->urlExec('editor','draw_papermeta') ?>" class="btn btn-primary btn-exec btn-xs" title="papermeta">papermeta</a>
    <a id="draw_psd" href="<?php $c->urlExec('app','soft',['soft'=>'PHOTOSHOP','file'=>$d['file']]) ?>" class="btn-open btn btn-primary btn-exec btn-sm" title="PHOTOSHOP">PSD</a>
    <a id="draw_svg_export" href="#" class="btn-open btn btn-primary btn-pjs btn-sm" data-pjs="exportSvg" title="ILLUSTRATOR">SVG</a>
    <a id="draw_svg_import" href="#" class="btn-open btn btn-primary btn-pjs btn-sm" data-pjs="importSvg" title="ILLUSTRATOR"><i class="fa fa-download"></i></a>

    <a id="draw_fullscreen" href="#" data-target='draw-page' class="btn-fullscreen btn btn-primary"><i class="fa fa-arrows-alt "></i></a>
</div>