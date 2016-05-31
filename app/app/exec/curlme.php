<?php
    /**
     * curlme
     */
    use Symfony\Component\Finder\Finder;
    use Symfony\Component\DomCrawler\Crawler;
    use Symfony\Component\Filesystem\Filesystem;

    $fs     = new Filesystem();
    $finder = new Finder();

    $finder->files()->in(DIR_CURLME);

    $files  = [];

    foreach ($finder as $key => $file) {
        $filename = $file->getRelativePathname();
        $filepath = $file->getRealpath();
        $fileinfo = pathinfo($filepath);

        /**
        * [0] => type
        * [1] => brand
        */
        $meta     = explode('_',$fileinfo['filename']);

        /**
         * Création du dossier
         */
        $dirbrand  = DIR_CURLME.'/'.$meta[1];
        $fs->mkdir($dirbrand);

        /**
         * Contenue a scanner
         */
        $html    = file_get_contents($filepath);
        $imgsrc  = [];

        $crawler = new Crawler($html);
        $imgs    = $crawler
            ->filterXPath('//div/img')
            ->each(function(Crawler $node, $i){
                $app      = new app();
                $fs       = new Filesystem();
                $filename = $app->clean($node->attr('alt'));

                $info     = explode('-', $filename);

                $dirImg   = DIR_CURLME.'/'.$info[0];
                $fileImg  = $dirImg.'/'.$filename.'.png';

                if(!is_dir($dirImg))
                    $fs->mkdir($dirImg);

                if(!file_exists($fileImg))
                    $app->getCurl($node->attr('src'), $fileImg);
            });
    }

    $r  = [
        'infotype' => "success",
        'msg'      => "ok exec curlme"
    ];
?>