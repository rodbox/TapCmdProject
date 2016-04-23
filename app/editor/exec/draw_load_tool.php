<?php
    /**
     * load tool
     */

    // $tool = $c->getJson(DIR_TOOL.'/'.$toolName.'.json');
    $tool = preg_replace('/\n/','',file_get_contents(DIR_TOOLS.'/default.json'));

    if (true) {
    $dataView    = [];
        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec load tool",
            'tool'     => $tool
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec load tool ",
            'data'     => ''
        ];
    }
?>