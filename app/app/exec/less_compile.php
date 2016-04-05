<?php
    /**
     * less compile
     */


    $options = array( 'compress'=>true );
    $parser  = new Less_Parser($options);
    $app     = new app();
    $project = $app->getProject();
    $dir     = $app->dirProject();
    $dirCss  = $dir.'/web/css';
    $css     = [];

    foreach ($project['css']['lessmaster'] as $key => $value) {
        if ($value!='') {
            $dirLess        = $dir.'/'.$value;

            $parser->parseFile( $dirLess, $dir.'/web/css' );

            $css            = $parser->getCss();
            $imported_files = $parser->allParsedFiles();
            file_put_contents($dirCss.'/app.css',$css,true);
        }
    }

    if (true) {
    $dataView    = [];


        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec less compile",
            'project'=>$imported_files

        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec less compile ",
            'data'     => ''
        ];
    }
?>
