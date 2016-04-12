{% set q = app.request.query.all %}

<!-- BEGIN NAVTABS : title  -->
<ul class="nav nav-tabs" id="img-editor">
    <li class="active">
        <a data-toggle="tab" href="#img-editor-tab-1" aria-expanded="true">View</a>
    </li>
    <li>
        <a data-toggle="tab" href="#img-editor-tab-2" aria-expanded="false">Crop </a>
    </li>
    <li>
        <a data-toggle="tab" href="#img-editor-tab-3" aria-expanded="false">Pin </a>
    </li>
</ul>
<!-- END NAVTABS : title  -->
<!-- BEGIN TABSCONTENT  -->
<div class="tab-content pad-content-2">
    <div id="img-editor-tab-1" class="tab-pane active">
		{{rb_loader('img_view',q)}}
    </div>
    <div id="img-editor-tab-2" class="tab-pane">
		{{rb_loader('img_crop',q,'edit_crop')}}
    </div>
    <div id="img-editor-tab-3" class="tab-pane">
		{{rb_loader('img_pin',q,'edit_pin')}}
    </div>
</div>
<!-- END TABSCONTENT  -->


