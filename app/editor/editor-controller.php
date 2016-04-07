<?php
    include('config.php');

    /**
    *
    */
    class editor extends app
    {

        var $k; // clés de securité optionnel (pour les requetes de ftp_control);

        function __construct($k='')
        {
            $this->k = $k;
        }

        static function btn_close($id)
        {
            echo '<a href="'.self::urlExec('editor','ws_del',['index'=>'open','key'=>$id],false).'" class=" editor-close btn-exec btn-muted" data-editor="'.$id.'" data-cb-app="editor" data-target="[\'data-editor\'=\''. $id .'\']" data-cb="editorClose"><i class="fa fa-remove"></i></a>';
        }

    }

    $editor = new editor();

 ?>