<?php

    use Symfony\Component\Filesystem\Filesystem;

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
            $list = scandir($src);

             // on scan le dossier
            $filters = array_merge($exclude, $this->filtersDefault);

            //list des nom de fichier ou de dossier a ne pas indexer
            // $filterMerge = array_merge($filter, $filterDefault);


            // on filtre le resultat
            $r = array_diff($list, $filters);


            return $r;
        }

        function files($dir) {
            $filter     = array(".", "..","__MACOSX", "nbproject", "_notes", ".DS_Store", ".komodotools", "_tmp",".git",".gitignore"); //list des nom de fichier ou de dossier a ne pas indexer
            $list       = scandir($dir); // on scan le dossier
            $r          = array_diff($list, $filter); // on filtre le resultat
            $files      = [];
            foreach ($r as $key => $val) { //on parcour chaque element
                if (is_dir($dir . "/" . $val)) {
                    unset($r[$key]); // on supprime le nom du dossier dans la liste de resultat car elle utilisé en clé pour les sous dossiers
                    $r[$val] = $this->files($dir . "/" . $val);
                }else{
                    unset($r[$key]);
                    // $files[] = $val;
                    $r["zzz".$val] = $val;
                }
            }
            ksort($r);
            return $r;
        }
    }




    // function scan_dir_filter($dir, $filter = "")
    // {
    //     $list = scandir($dir);

    //      // on scan le dossier
    //     $filterDefault = [
    //         ".",
    //         "..",
    //         "__MACOSX",
    //         "nbproject",
    //         "_notes",
    //         ".DS_Store",
    //         ".komodotools",
    //         "_tmp",
    //         "_INC_",
    //         "_EXEC_",".git"
    //     ];

    //     //list des nom de fichier ou de dossier a ne pas indexer
    //     if (is_array($filter))
    //         $filterMerge = array_merge($filter, $filterDefault);
    //     else
    //         $filterMerge = $filterDefault;


    //     // on filtre le resultat
    //     $r = array_diff($list, $filterDefault);


    //     return $r;
    // }



    // function file_list_mono($dir, $suffix = null)
    // {
    //     $filter = [
    //         ".",
    //         "..",
    //         "__MACOSX",
    //         "nbproject",
    //         "_notes",
    //         ".DS_Store",
    //         ".komodotools",
    //         "_tmp",
    //         "_INC_",
    //         "_EXEC_",
    //         ".git"
    //     ];

    //     //list des nom de fichier ou de dossier a ne pas indexer
    //     $suffix = ($suffix != null) ? $suffix . "/" : null;

    //     $list   = scandir($dir);
    //     // on scan le dossier
    //     $r      = array_diff(
    //         $list,
    //         $filter
    //     );

    //      // on filtre le resultat
    //     foreach ($r as $key => $val) {
    //          //on parcour chaque element
    //         if (is_dir($dir . "/" . $val)) {
    //             unset($r[$key]);
    //              // on supprime le nom du dossier dans la liste de resultat car elle utilisé en clé pour les sous dossiers
    //             $rsub = file_list_mono($dir . "/" . $val, $suffix . $val);
    //             foreach ($rsub as $key2 => $val2) {
    //                 $r[] = $val2;
    //             }
    //         }
    //         else
    //             $r[$key] = ($suffix != null) ? $suffix . $val : $val;
    //     }
    //     return $r;
    // }



    // function folder_list($dir, $rel = true)
    // {
    //      $filter = [
    //         ".",
    //         "..",
    //         "__MACOSX",
    //         "nbproject",
    //         "_notes",
    //         ".DS_Store",
    //         ".komodotools",
    //         "_tmp",
    //         "_INC_",
    //         "_EXEC_",
    //         "_TEMPLATES_",
    //         ".git"
    //     ];
    //      //list des nom de fichier ou de dossier a ne pas indexer

    //      $list   = scandir($dir);
    //      // on scan le dossier
    //      $r      = array_diff($list, $filter);

    //      // on filtre le resultat
    //     foreach ($r as $val) {
    //         $srcEval = $dir . "/" . $val;
    //         if (is_dir($srcEval)) $d[] = ($rel) ? $srcEval : $val;
    //     }
    //     return $d;
    // }



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



    // function delTree($dir)
    // {
    //     $files = array_diff(scandir($dir), array('.', '..'));

    //     foreach ($files as $file) {
    //         (is_dir("$dir/$file") && !is_link($dir)) ? delTree("$dir/$file") : unlink("$dir/$file");
    //     }
    //     return rmdir($dir);
    // }



    // function copy_dir($dir2copy, $dir_paste, $filters = [])
    // {
    //     // On vérifie si $dir2copy est un dossier
    //     if (is_dir($dir2copy) && !in_array($dir2copy, $filters)) {

    //         // Si oui, on l'ouvre
    //         if ($dh = opendir($dir2copy)) {

    //             // On liste les dossiers et fichiers de $dir2copy
    //             while (($file = readdir($dh)) !== false) {

    //                 // Si le dossier dans lequel on veut coller n'existe pas, on le créé
    //                 if (!is_dir($dir_paste)) mkdir($dir_paste, 0777);

    //                 // S'il s'agit d'un dossier, on relance la fonction récursive
    //                 if (is_dir($dir2copy . '/' . $file) && $file != '..' && $file != '.' && !in_array($file, $filters)) {
    //                     copy_dir($dir2copy . '/' . $file . '/', $dir_paste . '/' . $file . '/', $filters);
    //                 }

    //                 // S'il sagit d'un fichier, on le copie simplement
    //                 elseif ($file != '..' && $file != '.' && !in_array($file, $filters))
    //                     copy($dir2copy . '/' . $file, $dir_paste . '/' . $file);
    //             }

    //             // On ferme $dir2copy
    //             closedir($dh);
    //             return true;
    //         }
    //     }

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
