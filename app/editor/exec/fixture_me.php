<?php
    /**
     * fixture me
     */

    $parse       = new parse();
    $entityFile  = $parse->file($file,false);

    $info        = pathinfo($file);
    $dirFixture  = realpath($info['dirname'].'/..').'/DataFixtures/ORM';
    $fileFixture = 'Load'.$info['filename'];

    $data = [
        'ENTITY'          => $entityFile['class'],
        'NAMESPACE'       => $entityFile['namespace']."\\".$entityFile['class'],
        'BUNDLENAMESPACE' => preg_replace('/\\\Entity/','',$entityFile['namespace'])
    ];

   templateFile('fixture.php', $dirFixture, $data, $fileFixture);

    if (true) {
    $dataView    = [];


        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec fixture me",
            'dez'      => $data
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec fixture me ",
            'data'     => ''
        ];
    }
?>