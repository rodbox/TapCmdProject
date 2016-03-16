<?php
    /**
    *
    */
    class a
    {

        function __construct()
        {

        }

        public function progress($f)
        {
            $dir = dirname(__FILE__);
            return filesize($dir.'/'.$f);
        }

        public function del($f)
        {
            return unlink(__FILE__);
        }

        public function unzip($f)
        {

        }
    }
    $a  = $_GET['a'];
    $f  = $_GET['f'];

    $act = new a();

    if ($a == 'u')
        $r = $act->unzip($f);
    else if($a == 'd')
        $r = $act->del($f);
    else
        $r = $act->progress($f);

    echo $r;
 ?>