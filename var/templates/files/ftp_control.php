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
            $zip = new ZipArchive;
            $zip->open($this->dir.'/'.$f);
            $zip->extractTo($this->dir);
            $zip->close();
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