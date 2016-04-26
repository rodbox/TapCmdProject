<div class="btn-group " style="text-align: right;">
    <a id="draw_psd" href="<?php $c->urlExec('app','soft',['soft'=>'PHOTOSHOP','file'=>$d['file']]) ?>" class="btn-open btn btn-primary btn-exec btn-sm" title="PHOTOSHOP">PHOTOSHOP</a>
    <a id="draw_ai" href="<?php $c->urlExec('app','soft',['soft'=>'ILLUSTRATOR','file'=>$d['file']]) ?>" class="btn-open btn btn-primary btn-exec btn-sm" title="ILLUSTRATOR">ILLUSTRATOR</a>
    <a id="draw_doc" href="http://paperjs.org/reference/global/" data-popup='doc' class="btn-open btn-popup btn btn-primary"><i class="icomoon-vector2 "></i></a>
    <a id="draw_fullscreen" href="#" data-target='draw-page' class="btn-fullscreen btn btn-primary"><i class="fa fa-arrows-alt "></i></a>
</div>