<?php
    // include('config.php');

/**
*
*/
class app extends controller
{

    function __construct()
    {

    }



    public function getProject($name='')
    {
        $file = DIR_PROJECTS.'/'.$name.'.json';

        return $this->project = $this->getJson($file);
    }



    public function setProject($name, $dataSend)
    {
        $d = $this->project($name);

        $d = array_merge_recursive($dataSend, $d);

        $file = DIR_PROJECTS.'/'.$name.'.json';

        return $this->project = $this->setJson($file,$d);

    }



    public function getProjectFtp($name='')
    {
        $project = $this->getProject($name);
        return $project['ftp'] ?? [];
    }



    public function logProject($name='')
    {
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


    public function uploadProject($name, $dir_zip, $file_zip)
    {
        $this->logProject($name);

        $eval_put_file = ftp_put($this->ftp_conn, $file_zip, $dir_zip, FTP_ASCII);

        if(!$eval_put_file)
            $error[]= "le fichier n'a pas été chargé !!!";

        $this->closeProject();
    }



    // public function putProject($name, $dir_zip='')
    // {
    //     $dir_zip = DIR_TMP.'/test.txt';

    //     $this->logProject($name);

    //     $eval_put_file = ftp_put($this->ftp_conn, '/toto.txt', $dir_zip, FTP_ASCII);

    //     if(!$eval_put_file)
    //         $error[]= "le fichier n'a pas été chargé !!!";

    //     $this->closeProject();
    // }





    public function zipProject($name='')
    {
        set_time_limit(18000);


        $rand        = substr( md5(rand()), 0, 8);
        $time        = date('d_m_Y__H_i');
        $tmpName     = $name.'_'.$time.'_'.$rand;

        $dir_project = DIR_PROJECT.'/'.$name;
        $dir_tmp     = DIR_TMP.'/'.$tmpName;
        $dir_zip     = DIR_TMP.'/'.$tmpName.'.zip';
        $file_zip    = $tmpName.'.zip';

        mkdir($dir_tmp);
        copy_dir($dir_project, $dir_tmp);

        new zip_dir($dir_tmp, $dir_zip);

        $this->uploadProject($name, $dir_zip, $file_zip);

    }
}

$app = new app();

 ?>