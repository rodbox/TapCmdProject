<?php
    /**
     * less compile
     */
    use Symfony\Component\Filesystem\Filesystem;

    $fs = new Filesystem();

    $options = array( 'compress'=>true );
    $parser  = new Less_Parser($options);
    $app     = new app();
    $project = $app->getProject();
    $dir     = $app->dirProject();
    $dirCss  = $dir.'/web/css';
    if (!file_exists($dirCss)) {
            $fs->mkdir($dirCss);
    }

    $css     = [];

    foreach ($project['css']['lessmaster'] as $key => $value) {
        if ($value!='') {
            $dirLess        = $dir.'/'.$value;

            $info = pathinfo($value);

            $dirCss        = $dir.'/'.$info['dirname'].'/'.$info['filename'].'.css';

            $parser->parseFile( $dirLess, $dir.'/web/css' );

            $css            = $parser->getCss();
            $imported_files = $parser->allParsedFiles();
            file_put_contents($dirCss,$css,true);
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