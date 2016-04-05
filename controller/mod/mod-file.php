<?php

    use Symfony\Component\Filesystem\Filesystem;
    use Symfony\Component\Finder\Finder;

    /**
     * Class de gestion de fichier
     */

    /**
    * Required : symfony/filesystem and php-file-iterator
    *
    * USE voir le test app/file-iterator/index
    */

    class file
    {

        var $filtersDefault = [
            ".",
            "..",
            "__MACOSX",
            "nbproject",
            "_notes",
            ".DS_Store",
            ".komodotools",
            ".git",
            ".gitignore",
            ".com.apple.timemachine.supported",
            "_tmp"
        ];

        function __construct()
        {

        }


        public function fileclean($dir, $data = [])
        {
            $contentTemplate = file_get_contents($dir);

            $find            = [];
            $replace         = [];
            // foreach ($data as $key => $value) {
            //     $find[]    = "/ " . $key . " /";
            //     $replace[] = $value;
            // }

            $contentClean = preg_replace($data, $replace, $contentTemplate);

            return file_put_contents($dir, $contentClean, true);
        }


        public function filepush($dir, $content)
        {
            $contentTemplate = file_get_contents($dir);
            $contentPush    = $contentTemplate."\n".$content;

            return file_put_contents($dir, $contentPush, true);
        }



        /**
         * Copy un dossier avec un filtre
         * @param  string  $src     dir de la source
         * @param  string  $dest    dir de la destination
         * @param  array   $exclude liste des fichiers et dossier a exclure de la copie
         * @param  boolean $overide force l'ecrasement si le fichier ou le dossier existe déjà
         * @return array           la liste des fichiers copiés.
         */
        public function copy($src, $dest, $exclude=[], $overide = false)
        {
            if (count($exclude)>0) {
                foreach ($exclude as $key => $value)
                    $exclude[$key]= $src.'/'.$value;
            }

            $facade = new File_Iterator_Facade();
            $fs     = new Filesystem();

            $listFiltered = $facade->getFilesAsArray($src,'','',$exclude);

            // on supprime le premier element du tableau
            array_shift($listFiltered);

            $files = [];
            foreach ($listFiltered as $key => $fileSrc) {
                $fileRelative = str_replace($src, '', $fileSrc);
                $fileDest     = $dest.'/'.$fileRelative;
                $files[]      = $fileRelative;

                if(is_dir($fileSrc))
                    $fs->mkdir($fileDest);
                else
                    $fs->copy($fileSrc, $fileDest, $overide);
            }


            return $files;
        }

        /**
         * Liste les dossiers d'un dossier
         * @param  string $src dir de la source
         * @return array      la liste des dossiers.
         */
        public function dir($src, $exclude = [])
        {
            // on scan le dossier
            $list = scandir($src);

            //list des nom de fichier ou de dossier a ne pas indexer
            $filters = array_merge($exclude, $this->filtersDefault);

            // on filtre le resultat
            $r = array_diff($list, $filters);


            return $r;
        }

        public function files($dir, $filter = [], $recursive = false) {
            if(file_exists($dir)){
                $list    = scandir($dir); // on scan le dossier
                $filters = array_merge($filter, $this->filtersDefault);

                $r       = array_diff($list, $filters); // on filtre le resultat
                $files   = [];
                foreach ($r as $key => $val) { //on parcour chaque element
                    if (is_dir($dir . "/" . $val)) {
                        unset($r[$key]); // on supprime le nom du dossier dans la liste de resultat car elle utilisé en clé pour les sous dossiers
                        $r[$val] = ($recursive)?$this->files($dir . "/" . $val):[];
                    }
                    else{
                        unset($r[$key]);
                        $r["zzz".$val] = $val;
                    }
                }
                ksort($r);

                return $r;
            }
            else
                return [];
        }


        public function facade($dir, $exclude = [], $suffix = false)
        {
            $facade = new File_Iterator_Facade();
            $list   = $facade->getFilesAsArray($dir,'','',$exclude);

            if (!$suffix){
                foreach ($list as $key => $value)
                    $list[$key]=str_replace($dir, '',$value);
            }


            return $list;
        }


        public function finder($dir, $excludes=[])
        {
            $finder = new Finder();
            foreach ($excludes as $key => $exclude)
                $finder->notPath($exclude);

            $finder->files()->name('/\.js$/');


            $finder->files()->in($dir);

            foreach ($finder as $file) {
                echo"<pre>";
                print_r($file->getRelativePathname());
                echo"</pre>";
            }
        }
    }


    function replaceContent($contentTemplate, $data = []){
        $find            = [];
        $replace         = [];
        foreach ($data as $key => $value) {
            $find[]    = "{{{ " . $key . " }}}";
            $replace[] = $value;
        }

        return preg_replace($find, $replace, $contentTemplate);
    }


    function templateFile($templateFile, $targetDir, $data = [], $newFileName = "", $force = false)
    {
        $src             = DIR_TEMPLATE . "/files/" . $templateFile;
        $info            = pathinfo($templateFile);

        if ($newFileName == "")
            $newFileName     = $info["filename"];

        $contentTemplate = file_get_contents($src);

        $dest            = $targetDir . "/" . $newFileName . "." . $info["extension"];

        $content = replaceContent($contentTemplate, $data);

        return (!file_exists($dest) || $force)?file_put_contents($dest, $content, $force) : false;
    }



    function templateDir($templateDir, $targetDir, $data = [])
    {
        $src    = DIR_TEMPLATE . "/dir/" . $templateDir;

        $fs     = new Filesystem();
        $finder = new Finder();

        $list   = [];

        $fs->mirror($src, $targetDir);

        $finder->in($targetDir)->files();

        foreach ($finder as $key => $value) {
            $file            = $value->getRealpath();
            $info            = pathinfo($file);
            extract($info);
            $fileRename      = preg_replace('/RENAME/', $data['NAME'], $filename);
            $fileRenameDest  = $dirname.'/'.$fileRename.'.'.$extension;
            $contentTemplate = file_get_contents($file);

            $content         = replaceContent($contentTemplate, $data);
            unlink($file);
            file_put_contents($fileRenameDest, $content, true);
        }

        return $list;

        // if ($newFileName == "")
        //     $newFileName     = $info["filename"];

        // $dest            = $targetDir . "/" . $newFileName . "." . $info["extension"];


        // $contentTemplate = file_get_contents($src);
        // $find            = [];
        // $replace         = [];
        // foreach ($data as $key => $value) {
        //     $find[]    = "{{{ " . $key . " }}}";
        //     $replace[] = $value;
        // }

        // $content = preg_replace($find, $replace, $contentTemplate);

        // return (!file_exists($dest))?file_put_contents($dest, $content) : false;
    }



    //     function replace_Key_Val_File($data, $fileModel, $fileDest = true)
    //     {
    //         foreach ($data as $key => $val) {
    //             $find[]    = "[" . $key . "]";
    //             $replace[] = $val;
    //         }

    //         $contentModel   = file_get_contents($fileModel,true);

    //         $content        = str_replace($find, $replace, $contentModel);

    //         if($fileDest)
    //             file_put_contents($fileModel, $content);
    //         else
    //             return $content;
    //     }
    // }

    $f = new file();
?>
