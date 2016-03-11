<?php include('app/function.php');?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>App</title>
        <link href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="assets/css/app.css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper" >
            <!-- BEGIN ROW  -->
            <form id="form-run" action="app/exec/run.php" class="form-live form-inline">
                <nav class="navbar navbar-dark bg-inverse">
                    <div class="container">
                        <!-- BEGIN ROW  -->
                        <div class="row ">
                            <div class="col-md-8 col-md-offset-2 col-xs-12">
                                <div class="input-group">
                                    <select id="project" name="project" class="form-control c-select">
                                        <?php foreach (PROJECTS as $key => $project): ?>
                                        <option value="<?php echo $project; ?>"><?php echo $project; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <span class="input-group-addon btn btn-secondary-outline">
                                        <input type="checkbox" class="" aria-label="Checkbox for following text input">
                                    </span>
                                    <span class="input-group-btn">
                                        <button id="" data-toggle="button" class="btn btn btn-secondary-outline btn-modal" type="button" aria-pressed="false"><i class="fa fa-cog"></i></button>
                                        <input type="submit" class="btn btn btn-secondary-outline" />
                                    </span>
                                </div>
                            </div>
                        </div></div>
                        <!-- END ROW  -->
                    </nav>
                    <div class="container">
                        <!-- <div class="row "> -->
                        <!-- BEGIN COL : col-md-6 col-lg-6  -->
                        <div class="col-md-8 col-md-offset-2 col-xs-12">
                            <div class="btn-list row">
                                <?php foreach (CMDS as $cmd => $cmdMeta): ?>
                                <div class="col-xs-4">
                                    <label for="cmd_<?php echo $cmd; ?>" class="btn btn-box btn-cmd" data-src="#form-run">
                                        <input type="radio" name="cmd" id="cmd_<?php echo $cmd; ?>" autocomplete="off" value="<?php echo $cmdMeta; ?>"><?php echo $cmdMeta; ?>
                                    </label>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-md-12 col-xs-12"><pre><code id="result"></code></pre></div></div>
                        <!-- </div> -->
                    </form>
                    <!-- END ROW  -->
                    <!-- BEGIN MODAL : title  -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 id="modal-title" class="modal-title">title</h4>
                                </div>
                                <div id="modal-body"  class="modal-body">
                                </div>
                            </div>
                        </div>
                        </div><!-- /.modal -->
                        <!-- END MODAL : title -->
                    </div>
                    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
                    <script src="assets/vendor/bootstrap/dist/js/bootstrap.min.js" ></script>
                    <script src="assets/js/app.js" type="text/javascript"> </script>
                </body>
            </html>