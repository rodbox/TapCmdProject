<?php
session_start();

// Les constantes
include('config.php');

// Autoload de composer
include(COMPOSER);

// Controller de pack
include(APP_LOADER);

// Modules
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
    var $r = [];



    function __construct()
    {

    }



    public function title()
    {
        echo TITLE;
    }



    public function view($app='app', $view, $model='', $dataSend = [])
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



    public function model($app='app', $model, $dataSend = [])
    {
        $this->dataSend = $s = $dataSend;

        $file = DIR_APP.'/'.$app.'/models/'.$model.'.php';

        $c = $this;
        $app = new app();
        include($file);

        return $this->data = $d;
    }



    public function viewsAsync($app='app', $view='index', $model='', $dataSend = [])
    {
        $title = $_GET["name"] ?? $_GET["project"] ?? '';

        ob_start();
        $this->view($app, $view, $model, $dataSend);
        $out = ob_get_clean();

        return $out;
    }


    public function menu($app='app', $view='index', $model='', $dataSend = [])
    {
        $title = $_GET["name"] ?? $_GET["project"] ?? '';

        echo '<nav class="navbar nav c-menu"><div class="nav navbar-nav">';
        $this->view($app, $view, $model, $dataSend);
        echo '</div></nav>';

    }



    public function page($app='app', $page='index', $dataSend = [])
    {
        $this->dataSend = $s = $dataSend;

        $c = $this;

        include(DIR_APP.'/'.$app.'/pages/'.$page.'.php');
    }



    public function pageAsync($app='app', $page='index', $dataSend = [])
    {
        $title = $_GET["name"] ?? $_GET["project"] ?? '';

        ob_start();
        $this->page($app, $page, $dataSend);
        $out = ob_get_clean();

        $r = array(
            'infotype' => "success",
            'msg'      => "ok",
            'title'    => $title,
            'page'     => $out
        );

        echo json_encode($r);
    }



    /**
     * Test si un requete est asynchrone
     */
    public function isAsync()
    {
        return ( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' );
    }


    /**
     * Créer un URL de page
     */
    public function urlPage($app='app', $page='index', $data='')
    {
        $get = (is_array($data))?http_build_query($data):'';
        echo REL_SRC.'/?app='.$app.'&page='.$page.'&'.$get;
    }


    /**
     * Créer un URL executable
     */
    public function urlExec($app='app', $exec='index', $data='')
    {
        $get = (is_array($data))?http_build_query($data):'';
        echo WEB_EXEC.'/?app='.$app.'&exec='.$exec.'&'.$get;
    }

    /**
     * Retourne une liste d'attribut depuis un tableau
     */
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
            'class'       => 'btn-combo btn '.$css,
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



    public function setJson($dirJson, $arrayToJson){
        return file_put_contents($dirJson,json_encode($arrayToJson,JSON_PRETTY_PRINT));
    }


    public function suiSession($k)
    {
        return $_SESSION['app']['sui'][$k] ?? false;
    }


    public function btn_sui($title='', $key, $sui = "false", $css = ' btn btn-sm ')
    {
        $attr = [
            'class'        => 'btn-sui '.$css,
            'data-k'       => $key,
            'data-sui' => $this->suiSession($sui) ?? $sui
        ];

        $attr['class'] .= ($this->suiSession($key)=='true')?' active':'';

        echo "<a ";
        echo $this->attr($attr);
        echo ">";
        echo $title;
        echo "</a>";
    }

    public function attrSui()
    {
        $attrSui = [];

        foreach ($_SESSION['app']['sui'] ?? [] as $key => $value)
            $attrSui['data-sui-'.$key] = $value;

        echo $this->attr($attrSui);
    }


    /**
     * Charge une page de test d'un pack
     */
    public function test($app='app', $test, $dataSend = [])
    {
        $d = $dataSend;
        include(DIR_APP.'/'.$app.'/test/'.$test.'/index.php');
    }

    /**
     * Gestion de la variable $r
     * Utiliser pour stocker les $r dans app/exec_combo.php
    */
    public function pushR($r, $key = '')
    {
        $this->r[$key] = $r;
    }

    public function setR($r)
    {
        $this->r = $r;
    }

    public function getR()
    {
        return $this->r;
    }
}

$c = new controller();

?>