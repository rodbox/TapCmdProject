<?php
    /**
    *
    */
    class a
    {

        function __construct($k = '')
        {
            $this->dir = dirname(__FILE__);
            $k         = file_exists($this->dir.'/'.$k);
        }

        public function progress($f)
        {
            return filesize($this->dir.'/'.$f);
        }

        public function del($f)
        {
            unlink($this->dir.'/'.$f);
            return unlink(__FILE__);
        }

        public function unzip($f)
        {
            /**
            * TODO : Vérifier si la limite fonctionne sur le server sans le surcharger
            **/
            set_time_limit(0);

            $zip = new ZipArchive;
            $zip->open($this->dir.'/'.$f);
            $zip->extractTo($this->dir);
            $zip->close();

            echo '<a href="'.basename(__FILE__).'/?a=d&f='.$f.'">del me</a>';
        }
    }


    $a   = $_GET['a'];
    $f   = $_GET['f'];
    $k   = $_GET['k'];

    $act = new a($k);

    if ($a == 'u')
        $r = $act->unzip($f);
    else if($a == 'd')
        $r = $act->del($f);
    else
        $r = $act->progress($f);

    echo $r;
 ?>