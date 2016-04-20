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


        public function file($file, $id ='')
        {
            return pathinfo($file);

            // $info   = pathinfo($file);
            // $editor = EDITOR[$info['extension']];
            // $src    = EDITOR_SRC[$editor];

            // return $this->viewsAsync('editor','editors/'.$editor, $info);
        }


        public function editorTab($id = 1)
        {
            echo '<div id="sui-editor-grid-'.$id.'" data-pane-id="'.$id.'" class="sui-editor-grid">';
                $this->menu("editor","editor-menu",'',['id'=>$id]);
                echo'<div id="filesPanes-'.$id.'" class="tab-content" data-pane-id="'.$id.'" ></div>
            </div>';
        }
    }

    $editor = new editor();

 ?>