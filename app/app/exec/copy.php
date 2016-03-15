<?php
    /**
     * Copie un projet dans le dossier tmp
     */
        set_time_limit(18000);


        $rand        = substr( md5(rand()), 0, 8);
        $time        = date('H_i___d_m_Y_');
        $tmpName     = $time.'___'.$rand;

        $dir_project = DIR_PROJECT.'/'.$name;

        $dir_tmp     = DIR_TMP.'/'.$name.'/'.$tmpName;


        $file_zip    = $time.'_'.$rand.'.zip';
        $dir_zip     = DIR_TMP.'/'.$file_zip;

        $filter_default = [
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
            '/upd.sh',
            '/web/bundles/',
            '/web/assets/',
            // '/vendor',
            '/var'
        ];

    $file = new file();
    $list = $file->copy($dir_project, $dir_tmp, $filter_default);


if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok copy",
        'data'     => $list,
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