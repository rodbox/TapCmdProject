<?php
include('config.php');

include(APP_LOADER);

include("mod/mod-zip.php");
include("mod/mod-file.php");
include("mod/mod-tictac.php");

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

        // si le model est un string on charge le fichier du model
        if($model != '' && is_string($model))
            $this->model($app, $model, $dataSend);

        // sinon il sagit de donnée prédéfinis
        else
            $this->data = $model;

        $c = $this;
        $d = $this->data;
        $s = $this->dataSend;

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



    public function pageAsync($app='app', $page='index', $dataSend = '')
    {
        $title = $_GET["name"] ?? $_GET["project"] ?? '';

        ob_start();
        $this->page($app,$page,$dataSend);

        $out = ob_get_clean();

        $r = array(
            'infotype' => "success",
            'msg'      => "ok",
            'title'    => $title,
            'page'     => $out
        );

        echo json_encode($r);
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


    public function attr($attrs = [])
    {
        $r = '';
        foreach ($attrs as $attr => $value)
            $r .= $attr.' ="'.$value.'" ';

        return $r;
    }



    public function btn_combo($title='combo', $combos, $form='', $dataSend='', $css='btn btn-primary btn-sm')
    {
        $get       = (is_array($dataSend))?http_build_query($dataSend):'';
        $getCombos = http_build_query(['combos'=>$combos]);

        $titacId   = substr( md5(rand()), 0, 8);

        $urlCombo  = WEB_COMBO.'/?combo=true&'.$getCombos.'&'.$get.'&tictac='.$titacId;

        $urlTicTac = WEB_TICTAC.'/?tictac='.$titacId;

        $attr      = [
            'href'        => $urlCombo,
            'data-url'    => $urlTicTac,
            'data-tictac' => $titacId,
            'class'       => 'btn-combo '.$css,
            'data-form'   => $form,
            'title'       => $title ?? ''
        ];


        echo "<a ";
        echo $this->attr($attr);
        echo ">";
        echo $title;
        echo "</a>";
    }



    public function getJson($dirJson){
      if(file_exists($dirJson))
        return json_decode(file_get_contents($dirJson), true);
      else
        return ["LE FICHIER N'EXISTE PAS"];
    }



    public function setJson($dirJson,$arrayToJson){
        return file_put_contents($dirJson,json_encode($arrayToJson,JSON_PRETTY_PRINT));
    }



}

$c = new controller();

?>