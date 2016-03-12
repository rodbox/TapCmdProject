<?php
include('config.php');

/**
* controller
*/
class controller
{
    var $data;
    var $dataSend;

    function __construct()
    {
        # code...
    }

    public function title()
    {
        echo TITLE;
    }

    public function view($app='app', $view, $model='', $dataSend = '')
    {
        $this->dataSend = $s = $dataSend;

        $file = DIR_APP.'/'.$app.'/views/'.$view.'.php';

        if($model != '')
            $this->model($app, $model);

        $c = $this;

        include($file);

    }

    public function model($app='app', $model, $dataSend = '')
    {
        $this->dataSend = $s = $dataSend;

        $file = DIR_APP.'/'.$app.'/models/'.$model.'.php';

        $c = $this;

        include($file);

        return $this->data = $d;
    }

    public function page($app='app', $page='index', $dataSend = '')
    {
        $this->dataSend = $s = $dataSend;

        $c = $this;

        include(DIR_APP.'/'.$app.'/pages/'.$page.'.php');
    }



    public function isAsync()
    {
        return ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' );
    }



    public function urlPage($app='app', $page='index', $data='')
    {
        $get = (is_array($data))?http_build_query($data):'';
        echo WEB_SRC.'/?app='.$app.'&page='.$page.'&'.$get;
    }



    public function urlExec($app='app', $exec='index', $data='')
    {
        $get = (is_array($data))?http_build_query($data):'';
        echo WEB_EXEC.'/?app='.$app.'&exec='.$exec.'&'.$get;
    }



    public function getJson($dirJson){
      if(file_exists($dirJson))
        return json_decode(file_get_contents($dirJson), true);
      else
         return ["LE FICHIER N'EXISTE PAS"];
    }



    public function setJson($dirJson,$arrayToJson){
        file_put_contents($dirJson,json_encode($arrayToJson,JSON_PRETTY_PRINT));
    }
}

$c = new controller();

?>