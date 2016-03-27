<?php
	/**
     * {{ EXEC }}
     *
     */

	$error = [];


	// foreach ($_POST["A TRAITER"] as $key => $value) {

	// 	$eval = "MA FONCTION DE TRAITEMENT";

	// 	if(!$eval)
	// 		$error[] = $url;
	// }


	$valid = (count($error)==0)?true:false; //la condition



    if ($valid) {

		$dataView    = [];
        $target      = [
            '#target' => $c->viewsAsync('app', 'default', $dataView)
        ];

        $cb          = 'defaut';
        $a           = 'app';

        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec {{ EXEC }}",
            'data'     => '',
            'target'   => $target,
            'cb'       => $cb,
            'a'        => $a
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec {{ EXEC }} ",
            'data'     => ''
        ];
    }
?>