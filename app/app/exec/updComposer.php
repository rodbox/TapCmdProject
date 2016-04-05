<?php
    use Symfony\Component\Finder\Finder;

    /**
     * updComposer
     */

    $app = new app();
    $dir = $app->dirProject();


    $finder = new Finder();
    $finder->in($dir.'/src/RB')->files()->name('composer.json');
    $list = [];

    foreach ($finder as $key => $value) {
        $composer = $c->getJson($value->getRealpath());
        $req = $composer["require"]["symfony/symfony"] ??'';

        if ($req != "") {
            $composer["require"]["symfony/symfony"] = "3.*";
        }

        $list[] = $req;
        // unlink($value->getRealpath()."_");
        $c->setJson($value->getRealpath(), $composer);
    }

    if (true) {
    $dataView    = [];
        $r           = [
            'infotype' => "success",
            'msg'      => "ok exec updComposer",
            'data'     => $list
        ];
    }

    else{
        $r = [
            'infotype' => "error",
            'msg'      => "error exec updComposer ",
            'data'     => ''
        ];
    }
?>