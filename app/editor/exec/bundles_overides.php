<?php

      /**
       * overides
       */

      $app             = new app();
      $files           = [];

      $bundlesIndex    = $app->getBundles();
      $cur             = $app->cur();
      $bundleFrontName = ucfirst($cur).'Bundle';
      $dir = $app->dirProject();
      $bundleFront     = $bundlesIndex['src'][$bundleFrontName];

      // $dirBundle             = $dir.'/'.$bundles['src'][$src]['dir'];
      // $destOveride           = $dirBundle;
      // $destOverideView       = $dirBundle.'/Resources/views';
      // $destOverideForm       = $dirBundle;
      // $destOverideEvent      = $dirBundle;
      // $destOverideEntity     = $dirBundle.'/Entity';
      // $destOverideListener   = $dirBundle.'/Listener';
      // $destOverideController = $dirBundle.'/Controller';


      /**
       * Le nouveau fichier du bundle src
       */
      $data            = [
          'SRC'       => $bundleFrontName,
          'SRCDIR'    => $bundleFront['dir'],
          'NAMESPACE' => $bundleFront['namespace'],
          'VENDOR'    => "RBFrontBundle"
      ];
      templateFile('bundle_overide.php', $dir.'/'.$bundleFront['dir'], $data, $bundleFrontName, true);

      $list = $app->overideBundle('RBFrontBundle', $bundleFrontName);


      // foreach ($bundles as $key => $bundle) {
      //   $files[] = $app->overideBundle($bundle);
      // }


      if (true) {
      $dataView    = [];
          $r           = [
              'infotype' => "success",
              'files'    => $list,
              'msg'      => "ok exec overides",
          ];
      }

      else{
          $r = [
              'infotype' => "error",
              'msg'      => "error exec overides ",
              'data'     => ''
          ];
      }
  ?>
