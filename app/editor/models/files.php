<?php
$f         = new file();

$dir       = DIR_PROJECT.'/'.$app->cur();

$d['list'] = $f->files($dir,[],true);
$d['dir']  = $dir;

 ?>