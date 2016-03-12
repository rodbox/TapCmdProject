<fieldset>

    <!-- input : ftp_host -->
    <div class="form-group row">
            <label for="ftp_host" class="col-sm-3 form-control-label text-right">Hote</label>
            <div class="col-sm-9">
                <input type="text" name="ftp[host]" value="<?php echo $d['ftp']['host'] ?? ''; ?>" class="form-control" id="ftp_host" placeholder="Hote">
        </div>
    </div>
    <!-- end input : ftp_host -->

    <!-- input : user -->
    <div class="form-group row">
        <label for="ftp_user" class="col-sm-3 form-control-label text-right">User</label>
        <div class="col-sm-9">
                <input type="text" name="ftp[user]" value="<?php echo $d['ftp']['user'] ?? ''; ?>" class="form-control" id="ftp_user" placeholder="User" />
        </div>
    </div>
    <!-- end input : user -->

    <!-- input : ftp_password -->
    <div class="form-group row">
        <label for="ftp_password" class="col-sm-3 form-control-label text-right">Mot de passe</label>
        <div class="col-sm-9">
                <input type="text" name="ftp[password]" value="<?php echo $d['ftp']['password'] ?? ''; ?>" class="form-control" id="ftp_password" placeholder="Mot de passe" />
        </div>
    </div>
    <!-- end input : ftp_password -->

    <!-- input : ftp_port -->
    <div class="form-group row">
        <label for="ftp_port" class="col-sm-3 form-control-label text-right">Port</label>
        <div class="col-sm-9">
                <input type="text" name="ftp[port]" value="<?php echo $d['ftp']['port'] ?? ''; ?>" class="form-control" id="ftp_port" placeholder="Port" />
        </div>
    </div>
    <!-- end input : ftp_port -->
    </fieldset>
    <!-- BEGIN ROW  -->
    <div class="row ">

        <div class="col-sm-offset-3 col-sm-9">
            <a href="<?php $c->urlExec('app','ftp_test') ?>" class="btn btn-primary btn-exec btn-sm" title="Test de connextion" data-form="#form-config">Test de connextion</a>

        </div>
    <!-- END ROW  -->
    </div>