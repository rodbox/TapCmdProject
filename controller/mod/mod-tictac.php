<?php

/**
*  Tictac : créer un fichier du status d'un processus.
*  Un fonction JS va interroger ce fichier le temps du process.
*  voir : le fichier /js/app-tictac.js
*/

class tictac extends controller
{

    var $id;

    function __construct($id)
    {
        $this->id   = $id;
        $this->file = DIR_TICTAC.'/'.$id.'.json';
    }



    public function init($value='')
    {
        file_put_contents($this->file,'');
    }


    public function upd($key, $msg = '', $progress = '')
    {

        $this->current = [
            'current'   => $key,
            'msg'       => $msg,
            'progress'  => $progress
        ];

        $this->setJson($this->file, $this->current);

        return $this->current;
    }


    public function clear()
    {
        unlink($this->file);
        $this->id = null;
    }


    public function check()
    {
        return file_get_contents($this->file);
    }
}

 ?>