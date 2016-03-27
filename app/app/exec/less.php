<?php
    /**
     * Compile un fichier de variable au format less
     */

    $app = new app();

    $colors      = $_POST["css"]["colors"];
    $colorsNames = array_keys($colors);

    $vars        = $_POST["css"]['vars'];
    $varsNames   = array_keys($_POST["css"]['vars']);


    // /* export au format LESS*/
    $data = "";
    $data .= "// DeepTap & Deploy\n";
    $data .= "// Title : ".$name."\n";
    $data .= "// Date : ".date("d m Y - H:i")."\n";
    // $data .= "@colors : ".implode($colors,", ").";\n";
    // $data .= "@names : ".implode($colorsNames,", ").";\n";
    $data .= "\n\n";

    foreach ($colors as $colorName => $colorPack){
        $data .= "@c".ucfirst($colorName)."1:".$colorPack[1]."\n";
        $data .= "@c".ucfirst($colorName)."2:".$colorPack[2]."\n";
        $data .= "\n\n";
    }



    foreach ($vars as $varName => $var)
        $data .= "@".$varName.":".$var."\n";


    $put = file_put_contents($app->dirManage().'/vars.less', $data);

    if ($put) {

        $r = [
            'infotype' => "success",
            'msg'      => "ok less",
            'datas'    => $data
        ];
    }


    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error less ",
            'data'     => ''
        ];
    }
?>