<?php
    include('config.php');
use Symfony\Component\Filesystem\Filesystem;

class app extends controller
{

    var $k; // clés de securité optionnel (pour les requetes de ftp_control);
    var $name; // nom du projet en cours

    /**
     * TODO : On ne charge pas le projet dans le constructor aux cas ou il faudrait travailler sur plusieur projet simultanément (A VOIR);
     */

    function __construct($k='')
    {
        $this->k = $k;
    }

    /**
     * Retourne le projet en session
     * @return string le nom du projet;
     */
    static public function cur()
    {
        return $_SESSION['project']['name'] ?? DEFAULT_PROJECT;

    }

    /**
     * Retourne le projet en session
     * @return string le nom du projet;
     */
    public function dir()
    {
       return DIR_PROJECTS.'/'.self::cur();
    }



    /**
     * dir du projet
     */
    static public function dirProject()
    {
        return DIR_PROJECT.'/'.self::cur();
    }

    /**
     * dir de gestion du projet
     */
    static public function dirManage()
    {
        return DIR_PROJECTS.'/'.self::cur();
    }


    /**
     * Retourne les fichiers d'un projet en session
     * @return string le nom du projet;
     */
    public function files()
    {
       return $this->dir().'/files.txt';
    }

    public function getProject($name='')
    {
        if ($name=='')
            $name = $this->cur();

        $file = DIR_PROJECTS.'/'.$name.'/'.$name.'.json';
        $this->project = $this->getJson($file);
        return $this->project;
    }



    public function getParameters()
    {
        $dir            = $this->dirProject();

        $parameters     = $this->getYaml($dir.'/app/config/parameters.yml');
        $parametersDist = $this->getYaml($dir.'/app/config/parameters.yml.dist');

        $rb_config      = $this->getYaml($dir.'/app/config/rb_config.yml');
        $rb_configDist  = $this->getYaml($dir.'/app/config/rb_config.yml.dist');

        return [
            'local'=>[
                'parameters'=>$parameters,
                'rb_config'=>$rb_config

            ],
            'server'=>[
                'parameters'=>$parametersDist,
                'rb_config'=>$rb_configDist
            ]
        ];
    }

    /**
     * Retourne la todo list du projet
     * @param  string $name nom du projet
     * @return array       la todo
     */
    public function getTodo()
    {
        $dir           = $this->dirManage();
        $file          = $dir.'/todo.json';
        $this->project = $this->getJson($file);
        return $this->project;
    }

    /**
     * Set la todo
     * @param string $name     nom du projet
     * @param array $dataSend la todo en array
     */
    public function setTodo($name='', $dataSend)
    {
        if ($name=='')
            $name = $this->cur();
        $dir                  = $this->dirManage();
        $file                 = $dir.'/todo.json';
        return $this->project = $this->setJson($file, $dataSend);
    }


    public function getBundles()
    {
        return $this->getJson(self::dirManage().'/bundles.json');
    }


    /**
     * Retourne la traduction d'un index ou retourne toute la liste
     * @param  string $index [description]
     * @param  string $lang  [description]
     * @return [type]        [description]
     */
    public function getTrans($index ='', $lang = 'fr')
    {
        $dir    = DIR_PROJECT.'/'.$this->cur().'/app/Resources/translations/messages.'.$lang.'.yml';
        $trans  = $this->getYaml($dir);

        if ($index == '')
            return $trans;

        else{
            /**
            * TODO : revoir le parcour de l'index du tableau de traduction
            **/
            $indexExplode = explode('.',$index);
            $last         = array_pop($indexExplode);
            $sub          = (is_array($trans))?$trans:[];
            foreach ($indexExplode as $indexKey => $value) {
                if(array_key_exists($value,$sub))
                    $sub = $sub[$value];
                else
                    break;
            }
            return (isset($sub[$last]))?$sub[$last]:'';
        }
    }

    /**
     * Ajoute ou remplace un index de traduction
     * @param [type] $index [description]
     * @param string $value [description]
     * @param string $lang  [description]
     */
    public function addTrans($index, $value='', $lang = 'fr')
    {
        $dir    = DIR_PROJECT.'/'.$this->cur().'/app/Resources/translations/messages.'.$lang.'.yml';

        $trans    = $this->getTrans('',$lang);

        $transAdd = $this->indexToKey($index,$value);

        $transNew = array_replace_recursive($trans, $transAdd);


        return $this->setYaml($dir, $transNew);
    }







    public function setProject($name, $dataSend)
    {
        if ($name=='')
            $name = $this->cur();

        $d = $this->getProject($name);

        $d = array_replace_recursive($dataSend, $d);

        $file = DIR_PROJECTS.'/'.$name.'/'.$name.'.json';

        return $this->project = $this->setJson($file,$d);

    }



    public function getProjectFtp($name='')
    {
        if ($name=='')
            $name = $this->cur();

        $project = $this->getProject($name);
        return $project['ftp'] ?? [];
    }



    public function logProject($name='')
    {
        if ($name=='')
            $name = $this->cur();

        $project        = $this->getProjectFtp($name);

        extract($project);

        $this->ftp_conn  = ftp_connect($host) or die("Could not connect to $host");
        $this->ftp_login = ftp_login($this->ftp_conn, $user, $password);

        return $this->ftp_login;
    }



    public function closeProject()
    {
        ftp_close($this->ftp_conn);
    }


    public function uploadProject($name, $dir_zip, $file_zip, $key = 'a')
    {
        if ($name=='')
            $name = $this->cur();

        $this->logProject($name);

        $ftp_control       = DIR_TEMPLATE."/files/ftp_control.php";

        $control       = ftp_put($this->ftp_conn, $key.'.php', $ftp_control, FTP_ASCII);
        $eval_put_file = ftp_put($this->ftp_conn, $file_zip, $dir_zip, FTP_ASCII);

        if(!$control)
            $error[]= "le fichier n'a pas été chargé !!!";

        $this->closeProject();

        $project = $this->getProject($name);
        $url = $project['server']['web'];

        return $url.'/'.$key.'.php?a=u&f='.$file_zip;
    }



    public function getIcon($project = '')
    {
        echo '<img src="'.WEB_PROJECTS.'/'.$project.'/file/logo_'.$project.'.png" class="project_icon" alt="'.$project.'">';
    }

    public function getFav($project = '')
    {
        echo '<img src="'.WEB_PROJECTS.'/'.$project.'/file/fav_'.$project.'.png" class="project_icon" alt="'.$project.'">';
    }


    /**
     * Créer le bouton de deloiement du projet
     * @param  string $name nom du projet
     */
    public function btn_deploy()
    {
        $this->view('app','btn_deploy');
    }


    public function getDirRelative($file)
    {
        return str_replace($this->dirProject(),'',$file);
    }

    public function getDirLocal($file)
    {

    }

    public function getUrlLocal($file)
    {
        return str_replace($this->dirProject(),'http://localhost:8888/'.$this->cur(),$file);
    }

    public function getBundleInstall($bundle)
    {
        $dirInstall = DIR_OVERIDES.'/'.$bundle;

        $kernel     = (file_exists($dirInstall.'/kernel'))?file_get_contents($dirInstall.'/kernel'):'';
        $config     = (file_exists($dirInstall.'/config'))?file_get_contents($dirInstall.'/config'):'';
        $routing    = (file_exists($dirInstall.'/routing'))?file_get_contents($dirInstall.'/routing'):'';

        return [
            'kernel'  => $kernel,
            'config'  => $config,
            'routing' => $routing
        ];
    }


    public function pushBundle($bundle)
    {
        /**
        * TODO : Securiser le push pour eviter les doublons
        * Les includes des services doivent se faire en debut de fichier de config (utiliser le parse YAML)
        **/

        $dir            = $this->dirProject();

        $kernel         = file_get_contents($dir.'/app/AppKernel.php');
        $config         = file_get_contents($dir.'/app/config/config.yml');
        $routing        = file_get_contents($dir.'/app/config/routing.yml');

        $content        = $this->getBundleInstall($bundle);

        $kernelAdd      = $content['kernel'];
        $configAdd      = "\n".$content['config'];
        $routingAdd     = "\n".$content['routing'];

        $reg             = "/bundles = \[([a-zA-Z\(\)\{\s\n,=$\[\\\]{0,})/";
        preg_match($reg, $kernel, $match);

        $registerReplace = "bundles = [".$match[1].$kernelAdd."\n";
        $matchProtect    = addcslashes($match[0],'[{(),\\\'');
        $replace         = preg_replace("/".$matchProtect."/",$registerReplace, $kernel);

        file_put_contents($dir.'/app/AppKernel.php', $replace);
        file_put_contents($dir.'/app/config/config.yml',$config.$configAdd);
        file_put_contents($dir.'/app/config/routing.yml',$routing.$routingAdd);
    }

    /**
     * Overide de toutes les views d'un bundle vers le dossier app
     * @param  [type] $bundle [description]
     * @return [type]         [description]
     */
    public function overideBundle($bundleName, $bundleDest ='')
    {
        $fs = new Filesystem();

        $bundles = $this->getBundles();
        $bundle  = $bundles['vendor'][$bundleName];
        $dirSrc  = $this->dirProject().'/'.$bundle['dir'].'/Resources/views/';

        if ($bundleDest == '')
            $dirDest = $this->dirProject().'/app/Resources/'.$bundleName.'/views/';
        else
            $dirDest = $this->dirProject().'/'.$bundle['dir'].'/Resources/views/';

        $list = [];
        foreach ($bundle['views'] as $key => $value) {
            $list[] = [
                '$dest' => $dirDest.$value,
                '$src'  => $dirSrc.$value
            ];

            $dest = $dirDest.$value;
            $src  = $dirSrc.$value;

            $fs->copy($src,$dest);
        }

        return $list;
    }



    /**
     * WORKSPACE
     */

    public function getWorkspace()
    {
        $dir = $this->dir().'/workspace.json';
        return $this->getJson($dir);
    }


    public function setWorkspace($ws)
    {
        $dir = $this->dir().'/workspace.json';
        return $this->setJson($dir, $ws);
    }

    public function addWorkspace($index, $value ,$key = '')
    {
        $ws = $this->getWorkspace();

        if (!in_array($value, $ws[$index] ?? [])){
            if ($key =='')
                $ws[$index][] = $value;
            else
                $ws[$index][$key] = $value;

        }

        $this->setWorkspace($ws);

        return $ws;
    }


    public function delWorkspace($index, $key)
    {
        $ws = $this->getWorkspace();

        unset($ws[$index][$key]);

        $this->setWorkspace($ws);

        return $ws;
    }

}

$app = new app();

 ?>