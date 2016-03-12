<?php




class zip_dir
{


  /**
   * Zip a folder (include itself).
   * Usage:
   *   HZip::zip_dir('/path/to/sourceDir', '/path/to/out.zip');
   *
   * @param string $sourcePath Path of directory to be zip.
   * @param string $outZipPath Path of output zip file.
   * @param array $filter filter file and folder to include in zipfile
   * @param bool $inFolder true for create dir in zip or false for not
   */
  public  function __construct($sourcePath, $outZipPath, $filter =[], $inFolder=true) {


    $pathInfo   = pathInfo($sourcePath);
    $parentPath = $pathInfo['dirname'];
    $dirName    = $pathInfo['basename'];

    $z          = new ZipArchive();
    $z->open($outZipPath, ZIPARCHIVE::CREATE);

    if($inFolder){
      $z->addEmptyDir($dirName);
      $parentPath   = $pathInfo['dirname'];
    }
    else{
      $parentPath= $sourcePath;
    }

    self::folderToZip($sourcePath, $z, $parentPath,$filter);
    $z->close();
  }



  /**
   * Add files and sub-directories in a folder to zip file.
   * @param string $folder
   * @param ZipArchive $zipFile
   * @param int $exclusiveLength Number of text to be exclusived from the file path.
   */
  private  function folderToZip($folder, &$zipFile, $sourcePath,$filter) {

      $handle = scandir($folder);

      /* */
      array_shift($handle);
      array_shift($handle);

      foreach ($handle as $key => $value) {
        $path =  $folder."/".$value;

        if(!in_array($path, $filter) && !in_array($path,array(".","..",".DS_Store"))){
          $localPath = str_replace($sourcePath, "", $path);
          if (is_file($path))
            $zipFile->addFile($path, $localPath);

          elseif (is_dir($path)) {
            $zipFile->addEmptyDir($localPath);
            self::folderToZip($path, $zipFile, $sourcePath,$filter);
          }
        }

      }


  }


}  ?>