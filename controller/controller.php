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
include("mod/mod-parse.php");
include("mod/mod-tictac.php");

use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Dumper;
use Symfony\Component\Filesystem\Filesystem;
use \Michelf\Markdown;
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

        $file           = DIR_APP.'/'.$app.'/views/'.$view.'.php';

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

        $file           = DIR_APP.'/'.$app.'/models/'.$model.'.php';

        $c              = $this;
        $app            = new app();
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
    static public function urlPage($app='app', $page='index', $data='', $echo = true)
    {
        $get = (is_array($data))?http_build_query($data):'';
        $url = REL_SRC.'/?app='.$app.'&page='.$page.'&'.$get;
        if($echo)
            echo $url;

        return $url;
    }


    /**
     * Créer un URL de page
     */
    static public function urlPopup($app='app', $page='index', $data='', $echo = true)
    {
        $get = (is_array($data))?http_build_query($data):'';
        $url = REL_SRC.'/popup.php?app='.$app.'&page='.$page.'&'.$get;
        if($echo)
            echo $url;

        return $url;
    }


    /**
     * Créer un URL executable
     */
    static public function urlExec($app='app', $exec='index', $data='', $echo = true)
    {
        $get = (is_array($data))?http_build_query($data):'';
        $url = WEB_EXEC.'/?app='.$app.'&exec='.$exec.'&'.$get;
        if($echo)
            echo $url;

        return $url;
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



    public function btn_combo($title='combo', $combos, $form='', $dataSend='', $css='btn btn-primary btn-sm', $cb = 'default')
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
            'data-cb'     => $cb,
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




    public function getYaml($dirYaml)
    {
        if(file_exists($dirYaml)){
            $yaml  = new Parser();
            $parse = $yaml->parse(file_get_contents($dirYaml));

            return (is_array($parse))?$parse:[];
        }
        else
            return [];
    }


    /**
     * enregistre un array en yaml
     * @param string  $dirYaml   dir de la destination du fichier
     * @param [type]  $arrayToYaml array a enregistrer
     * @param boolean $force       force l'ecriture du fichier
     */
    public function setYaml($dirYaml, $arrayToYaml, $force = true)
    {
        $dumper = new Dumper();

        $yaml = $dumper->dump($arrayToYaml, 2);

        if($force){
            $fs = new Filesystem();
            $fs->mkdir(dirname($dirYaml));
        }

        file_put_contents($dirYaml, $yaml);
    }


    /**
     * Retourne un markdown
     * @param  [type] $dir [description]
     * @return [type]      [description]
     */
    public function getMd($dir)
    {
        if(file_exists($dir)){
            $content  = file_get_contents($dir);
            echo '<div class="markdown">';
            echo Markdown::defaultTransform($content);
            echo '</div>';
        }
    }


    /**
     * un index string se transform en un jeu de clés associatives
     * @param  string $value [description]
     * @return array        [description]
     */
    public function indexToKey($index='app.index.toto', $value='')
    {
        $exp   = explode('.',$index);
        $imp   = '$r["'.implode('"]["',$exp).'"]="'.$value.'";';
        eval($imp);

        return (is_array($r))?$r:[];

    }



    /**
     * Retourne la valeur d'une sui
     * @param  string $k clés sui
     * @return string    la valeur
     */
    public function suiSession($k)
    {
        return $_SESSION['app']['sui'][$k] ?? false;
    }


    /**
     * Créer un bouton sui
     * @param  string $title
     * @param  [type] $key   la clé d'id de sui
     * @param  string $sui   [description]
     * @param  string $css   class css du bouton
     * @return [type]        le bouton
     */
    public function btn_sui($title='', $key, $sui = "false", $css = ' btn btn-sm ')
    {
        $attr = [
            'class'        => 'btn-sui btn-sui-'.$key.' '.$css,
            'data-k'       => $key,
            'data-sui' => $this->suiSession($sui) ?? $sui,
            'data-cb' => 'sui'.ucfirst($key)
        ];

        $attr['class'] .= ($this->suiSession($key)=='true')?' active':'';

        echo "<a ";
        echo $this->attr($attr);
        echo ">";
        echo $title;
        echo "</a>";
    }



    /**
     * Attribut de sui
     * @return [type] [description]
     */
    public function attrSui()
    {
        $attrSui = [];

        foreach ($_SESSION['app']['sui'] ?? [] as $key => $value)
            $attrSui['data-sui-'.$key] = $value;

        echo $this->attr($attrSui);
    }



    /**
     * Creer le file d'ariane d'accés a un fichier dans le finder
     * @param  [type]  $dir [description]
     * @param  boolean $src [description]
     * @return [type]       [description]
     */
    public function breadFile($dir, $src = false)
    {
        $dirProject = DIR_PROJECT.'/'.$_SESSION['project']['name'];

        $dir        = str_replace($dirProject, '', $dir);

        $bread      = explode('/',$dir);

        $dirBread   = $dirProject;
        foreach ($bread as $key => $value) {
            $dirBread .= $value.'/';
            $url      = WEB_EXEC.'/?app=app&exec=sh-dir&dir='.$dirBread;

            $attr     = [
                'href'    => $url,
                'class'   => 'btn-sh',
                'data-cb' => 'openDir',
            ];

            $bread[$key] = $this->wrap(basename($value), $attr, 'a');
        }

        echo implode(' / ',$bread);
    }


    /**
     * Englobe le contenu dans une balise html
     * @param  string $content le contenu
     * @param  array  $attr    les attributs du wrapper
     * @param  string $tag     le type de balise du wrapper
     * @return string          le contenu wrappé.
     */
    public function wrap($content = '', $attr=[], $tag = 'div')
    {
        $attr = $this->attr($attr);

        $wrap = '<'.$tag.' ';
        $wrap .= $attr;
        $wrap .= '>';
        $wrap .=$content;
        $wrap .='</'.$tag.'>';

        return $wrap;
    }


    /**
     * Test de l'intagration twig
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function twig($value='Rodolphe')
    {
        $loader = new Twig_Loader_Array(array(
            'index' => 'Hello {{ name }}!',
        ));
        $twig = new Twig_Environment($loader);

        echo $twig->render('index', array('name' => $value));
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

    /**
     * Redéfinie la valeur de $this->r;
     * @param [type] $r [description]
     */
    public function setR($r)
    {
        $this->r = $r;
    }

    /**
     * Retourne la list de valeurs
     * @return [type] [description]
     */
    public function getR()
    {
        return $this->r;
    }
}

$c = new controller();

?>