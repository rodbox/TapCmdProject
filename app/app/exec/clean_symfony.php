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
    templateFile('rb_config.yml',$dir, []);


    $dir = $dirP;
    templateFile('.bowerrc',$dir, []);




// $add = "fos_user:
//     db_driver: orm # other valid values are 'mongodb', 'couchdb' and 'propel'
//     firewall_name: main
//     # user_class: FOS\UserBundle\Model\User
//     user_class: RB\UserBundle\Entity\User
//     registration:
//         form:
//             type: RB\UserBundle\Form\RegistrationType";
//     $file->filepush($dirP.'/app/config/config.yml', $add);



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