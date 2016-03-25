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
                // // Dump the absolute path
                // var_dump($file->getRealpath());

                // // Dump the relative path to the file, omitting the filename
                // var_dump($file->getRelativePath());

                // // Dump the relative path to the file
                // var_dump($file->getRelativePathname());
            }
        }
    }


    function templateFile($templateFile, $targetDir, $newFileName = "")
    {
        $src             = DIR_TEMPLATE . "/files/" . $templateFile;
        $info            = pathinfo($templateFile);

        if ($newFileName == "") {
        $newFileName     = $info["filename"];
        }

        $dest            = $targetDir . "/" . $newFileName . "." . $info["extension"];


        if (!file_exists($dest))
            return copy($src, $dest);
        else
            return false;
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
