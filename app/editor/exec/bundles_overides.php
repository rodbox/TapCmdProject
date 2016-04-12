<?php

      /**
       * overides d'un bundle
       */

      $app             = new app();
      $files           = [];

      $bundlesIndex    = $app->getBundles();
      $cur             = $app->cur();
      $dir             = $app->dirProject();

      $bundleFrontName = 'FrontBundle';
      $bundleFront     = $bundlesIndex['src'][$bundleFrontName];
      $bundleFrontDir  = $bundlesIndex['src'][$bundleFrontName]['dir'];

      $bundleAdminName = 'AdminBundle';
      $bundleAdmin     = $bundlesIndex['src'][$bundleAdminName];
      $bundleAdminDir  = $bundlesIndex['src'][$bundleAdminName]['dir'];

      /**
       * Le nouveau fichier du bundle src
       */
      $data            = [
          'SRC'       => $bundleFrontName,
          'SRCDIR'    => $bundleFront['dir'],
          'NAMESPACE' => $bundleFront['namespace'],
          'VENDOR'    => "RBFrontBundle"
      ];
      templateFile('bundle_overide.php', $dir.'/'.$bundleFrontDir, $data, $bundleFrontName, true);

      $list = $app->overideBundle('RBFrontBundle', $bundleFrontName);

      /**
       * Le nouveau fichier du bundle src
       */
      $data            = [
          'SRC'       => $bundleAdminName,
          'SRCDIR'    => $bundleAdmin['dir'],
          'NAMESPACE' => $bundleAdmin['namespace'],
          'VENDOR'    => "RBAdminBundle"
      ];
      templateFile('bundle_overide.php', $dir.'/'.$bundleAdminDir, $data, $bundleAdminName, true);

      $list = $app->overideBundle('RBAdminBundle', $bundleAdminName);



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
