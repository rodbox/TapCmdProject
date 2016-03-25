<?php
    include('config.php');


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
        return $_SESSION['project']['name'] ?? '';

    }

    /**
     * Retourne le projet en session
     * @return string le nom du projet;
     */
    public function dir()
    {
       return DIR_PROJECTS.'/'.$this->cur();
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


    /**
     * Retourne la todo list du projet
     * @param  string $name nom du projet
     * @return array       la todo
     */
    public function getTodo($name='')
    {
        if ($name=='')
            $name = $this->cur();

        $file = DIR_PROJECTS.'/'.$name.'/todo.json';
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

        $file = DIR_PROJECTS.'/'.$name.'/todo.json';
        return $this->project = $this->setJson($file, $dataSend);
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



    /**
     * Retourne le dossier de la gestion du projet
     * @param  [type] $name [description]
     * @return [type]       [description]
     */
    public function dirProject($name='')
    {
        if ($name=='')
            $name = $this->cur();
        return DIR_PROJECTS.'/'.$name;
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

        if (!in_array($value, $ws[$index])){
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