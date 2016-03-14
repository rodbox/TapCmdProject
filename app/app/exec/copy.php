<?php
    /**
     * Copie un projet dans le dossier tmp
     */
        set_time_limit(18000);


        $rand        = substr( md5(rand()), 0, 8);
        $time        = date('d_m_Y__H_i');
        $tmpName     = $project.'_'.$time.'_'.$rand;

        $dir_project = DIR_PROJECT.'/'.$project;
        $dir_tmp     = DIR_TMP.'/'.$tmpName;
        $dir_zip     = DIR_TMP.'/'.$tmpName.'.zip';
        $file_zip    = $tmpName.'.zip';



        $dir_tmp_same = DIR_TMP.'/'.$project;

        mkdir($dir_tmp_same);

        $filter_default = [
            'sftp-config.json',
            '_sftp-config.json',
            'cache.sh',
            'chmod.sh',
            'clear.bat',
            'crud.sh',
            'dump.bat',
            'install.sh',
            'npm-debug.log',
            'phpunit.xml.dist',
            'route.sh',
            'routes.bat',
            'routes.txt',
            'run.bat',
            'service.bat',
            'service.sh',
            'service.txt',
            'upd.sh',
            'web/bundles/'
        ];

        $filters = array_merge($filters,$filter_default);

        foreach ($filters as $key => $value)
            $filter[]= $value;


        // $filter = [
        //     $dir_project.'/var',
        //     $dir_project.'/vendor'
        //     // $dir_project.'/web'
        // ];



        //
        $list = copy_dir($dir_project, $dir_tmp_same, $filter);

if (true) {


    $r = [
        'infotype' => "success",
        'msg'      => "ok copy",
        'data'     => $list
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