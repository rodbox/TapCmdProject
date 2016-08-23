<?php
    /**
     * Créer un nouveau fichier de projet
     */

    $dir_new_project = DIR_MANAGE.'/'.$name;

    if (!file_exists($dir_new_project) || $force ?? false) {

        $dataTemplate = [
            'RENAME'      => $name,
            'NAME'        => $name,
            'DOMAIN'      => $name,
            'FRONTBUNDLE' => ucfirst($name).'Bundle',
            'TYPE'        => $type,
            'DESCRIPTION' => $description ?? '',
            'TYPE'        => $type ?? ''
        ];

        /**
         * Template du manage du projet
         */
        templateDir('manage', DIR_MANAGE.'/'.$name, $dataTemplate);

        /**
         * Template de Creation du projet
         */

        if ($type == 'Symfony') {
            $app = new app();

            $cmd     = 'php '.DIR_PROJECT.' symfony new '.$name;
            $out     = shell_exec($cmd);
            $project = $name;
            $cb      = 'modal';
            $redirect=[
                'app'  => 'app',
                'page' => 'process_info',
                'data' => [
                    'name'=>$name
                ],
                'modal'=>'modalSm'
            ];


           $c->terminal(DIR_PROJECT);

        }
        else{
            $project = templateDir($type ?? 'rodbox', DIR_PROJECT.'/'.$name, $dataTemplate);
            $cb = 'refresh';
            $redirect=[
                'app'  => 'app',
                'page' => 'config',
                'data' => [
                    'name'=>$name
                ],
                'modal'=>'modalSm'
            ];
        }
        $_SESSION['project']['name'] = $name;

        $r = [
            'infotype' => "success",
            'msg'      => "ok",
            'data'     => $project,
            'force'    => $force,
            'out'      => $out ?? '',
            'redirect' => $redirect,
            'cb'       => $cb
        ];

        /**
        * TODO : si la variable new est true on install le projet depuis le dossier template
        **/


        /**
         * Template VHOST
         */
        templateFile('vhost.conf', DIR_VHOST.'/'.$name, $dataTemplate);
    }


    else{
        $r = [
            'infotype' => "error",
            'msg'      => "Fichier existe",
            'data'     => ''
        ];
    }
 ?>