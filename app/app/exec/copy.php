<?php
    /**
     * Copie un projet dans le dossier tmp
     */


    $rand        = substr( md5(rand()), 0, 8);
    $k           = $rand;
    $time        = date('H_i___d_m_Y_');
    $tmpName     = $rand;

    $dir_project = DIR_PROJECT.'/'.$name;
    $dir_tmp     = DIR_TMP.'/'.$name.'/'.$tmpName;

    $filter_default = [
        '/.com.apple.timemachine.supported',
        '/*.php',
        '/.DS_Store',
        '/sftp-config.json',
        '/_sftp-config.json',
        '/cache.sh',
        '/chmod.sh',
        '/clear.bat',
        '/crud.sh',
        '/dump.bat',
        '/install.sh',
        '/npm-debug.log',
        '/phpunit.xml.dist',
        '/route.sh',
        '/routes.bat',
        '/routes.txt',
        '/run.bat',
        '/service.bat',
        '/service.sh',
        '/service.txt',
        '/upd.sh'
    ];

    $filters_all = array_merge($filter_default, $filters);

    $file = new file();
    $list = $file->copy($dir_project, $dir_tmp, $filters_all);

    if (true) {
        $r = [
            'infotype' => "success",
            'msg'      => "ok copy",
            'data'     => $list,
            'k'        => $rand,
            'tmp'      => $tmpName
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error copy ",
            'data'     => ''
        ];
    }
?>