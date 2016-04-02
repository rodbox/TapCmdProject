<?php
    /**
     * db create
     */

    extract($_POST['local']['database']);

    /**
     * action db create
     */
    $app           = new app();
    $dirParameters = $app->dirProject().'/app/config/parameters.yml';

    $parameters    = $app->getYaml($dirParameters);

    $parameters['parameters']['database_name']     = $basename;
    $parameters['parameters']['database_user']     = $user;
    $parameters['parameters']['database_password'] = $password;
    $parameters['parameters']['database_host']     = $host;

    $app->setYaml($dirParameters,$parameters, true);



    $cmd = "php ".$app->dirProject()."/bin/console ";
    // $cmd1 = $cmd.'cache:clear';
    // $cmd1 = $cmd.'doctrine:database:drop --force';
    $cmd2 = $cmd.'doctrine:database:create';

    // $out1 = shell_exec($cmd1);
    $out2 = shell_exec($cmd2);

    if (true) {
    $dataView    = [];
        $cb          = 'defaut';
        $a           = 'append';

        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec action db create",
            'data'     => $out2,

            'cb'       => $cb,
            'a'        => $a
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec db create name ",
            'data'     => ''
        ];
    }
?>