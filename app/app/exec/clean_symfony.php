<?php
    /**
     * clean
     */
    use Symfony\Component\Filesystem\Filesystem;
    $fs   = new Filesystem();
    $file = new file();
    $app  = new app();

    $dirP = $app->dirProject();

    $fs->remove($dirP.'/src/AppBundle');


    $dir  = $dirP.'/app/AppKernel.php';
    $file->fileclean($dir,[
         "/new AppBundle\\\AppBundle\(\),\n/"
    ]);

    $dir = $dirP.'/app/config/routing.yml';
    $file->fileclean($dir,[
         "/app:
    resource: \"@AppBundle\/Controller\/\"
    type:     annotation/"
    ]);

    $dir = $dirP.'/app/config';
    templateFile('rb_config.yml',$dir, [
        'TITLE'       => $app->cur(),
        'TITLE_SHORT' => $app->cur(),
        'WEB_ROOT'    => 'http://localhost:8000',
        'DIR_ROOT'    => $app->dirProject(),
        'DIR_CDN'     => '/Applications/MAMP/htdocs/minutephone_cdn',
        'WEB_CDN'     => 'http://localhost:8888/minutephone_cdn'
        ]);
    templateFile('rb_twig.yml',$dir, []);


    $dir = $dirP;
    templateFile('.bowerrc',$dir, []);


    $app->pushBundle('RBCoreBundle');
    $app->pushBundle('RBTransBundle');
    $app->pushBundle('FOSUserBundle');
    $app->pushBundle('FOSJsRoutingBundle');
    $app->pushBundle('RBFrontBundle');
    $app->pushBundle('RBDevBundle');

    $dirConfig = $dirP.'/app/config';
    shell_exec('open '. $dirConfig.'/config.yml');
    shell_exec('open '. $dirConfig);

    if (true) {
    $dataView    = [];
        $target      = [
            '#debug' => $c->viewsAsync('app', 'default', $dataView)
        ];

        $cb          = 'default';
        $a           = 'append';

        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec clean",
            'data'     => $dataView,
            'target'   => $target,
            'cb'       => $cb,
            'a'        => $a
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec clean ",
            'data'     => ''
        ];
    }
?>