<?php
// editor
//
    $app     = new app();
    $parse   = new parse();
    $editor  = new editor();
    $dirFile = $dir.'/'.$file;
    $edit = $editor->file($dirFile);
    $content = file_get_contents($dirFile);
    $rand    = (isset($key))?$key:substr( md5(rand()), 0, 8);

    $ws      = $app->getWorkspace();
    $autopen = isset($autopen) ?? false;
    $inarray = in_array($dir.'/'.$file, $ws['open']);

    $info    = pathinfo($dirFile);

    $parse   = $parse->file($dirFile);

    if (!$inarray || $autopen == 'true') {

        $id_replace = $rand;

        $metaTabs = [
            'dir'  => $dir,
            'file' => $file,
            'id'   => $id_replace
        ];
        $metaPane = [
            'dir'     => $dir,
            'file'    => $file,
            'content' => $content,
            'id'      => $id_replace,
            'parse'   => $parse
        ];

        $paneID = $ws['pane'][$id_replace] ?? '1';

        $target = [
            '#filesTabs-'.$paneID  => $c->viewsAsync('editor', 'editor-tab', $metaTabs),
            '#filesPanes-'.$paneID => $c->viewsAsync('editor', 'editor-pane', $metaPane)
        ];

       /**
         * Nouvelle ouverture
         */
        if($autopen != 'true'){
            $target['#filesOpens'] = $c->viewsAsync('editor', 'files-open', $metaTabs);
            $app->addWorkspace('open',$dir.'/'.$file, $id_replace);
            $app->addWorkspace('pane',$paneID, $id_replace, true);
        }

        $cb = 'editor_init';

        $r = [
            'infotype' => "success",
            'msg'      => "ok editor",
            'dir'      => $dir,
            'file'     => $file,
            'content'  => $content,
            'target'   => $target,
            'edit'     => $edit,
            'a'        => 'append',
            'id'       => $id_replace,
            'idre'     => $id_replace,
            'cb'       => $cb,
            'ws'       => $ws['pane'][$id_replace] ?? '1'
        ];
}



else{

    $id = array_search($dir.'/'.$file, $ws['open']);

    $r = [
        'infotype' => "error",
        'msg'      => "error editor ",
        'cb'       => 'triggerTabs',
        'id'       => $id,
        'data'     => $inarray
    ];
}
?>