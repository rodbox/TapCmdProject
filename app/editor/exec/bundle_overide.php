<?php
      /**
       * overide du controller du bundle
       */

      $app               = new app();

      $bundlesIndex      = $app->getBundles();
      $cur               = $app->cur();
      $dir               = $app->dirProject();

      $info              = pathinfo($_GET['file']);

      $vendor            = $_POST['vendor'];
      $bundle            = $info['filename'];


      $bundleOveride     = $bundlesIndex['src'][$bundle];
      $bundleOverideDir  = $bundlesIndex['src'][$bundle]['dir'];

      /**
       * Le nouveau fichier du bundle src
       */
      $data            = [
          'SRC'       => $bundle,
          'SRCDIR'    => $bundleOveride['dir'],
          'NAMESPACE' => $bundleOveride['namespace'],
          'VENDOR'    => $vendor
      ];
      templateFile('bundle_overide.php', $dir.'/'.$bundleOverideDir, $data, $bundle, true);

      if (true) {
      $dataView    = [];
          $r           = [
              'infotype' => "success",
              'bundle'=>$dir.'/'.$bundleOverideDir,
              'msg'      => "ok exec overide",
          ];
      }

      else{
          $r = [
              'infotype' => "error",
              'msg'      => "error exec overide ",
              'data'     => ''
          ];
      }
  ?>
