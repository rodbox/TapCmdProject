<fieldset>
<legend>Server</legend>
    <!-- input : ftp_host -->
    <div class="form-group row">
            <label for="ftp_host" class="col-sm-3 form-control-label text-right">Hote</label>
            <div class="col-sm-9">
                <input type="text" name="server[database][host]" value="<?php echo $d['server']['database']['host'] ?? ''; ?>" class="form-control" id="database_host" placeholder="Hote">
        </div>
    </div>
    <!-- end input : database_host -->

    <!-- input : ftp_host -->
    <div class="form-group row">
            <label for="ftp_host" class="col-sm-3 form-control-label text-right">Basename</label>
            <div class="col-sm-9">
                <input type="text" name="server[database][basename]" value="<?php echo $d['server']['database']['basename'] ?? ''; ?>" class="form-control" id="database_host" placeholder="Basename">
        </div>
    </div>
    <!-- end input : database_host -->

    <!-- input : user -->
    <div class="form-group row">
        <label for="database_user" class="col-sm-3 form-control-label text-right">User</label>
        <div class="col-sm-9">
                <input type="text" name="server[database][user]" value="<?php echo $d['server']['database']['user'] ?? ''; ?>" class="form-control" id="database_user" placeholder="User" />
        </div>
    </div>
    <!-- end input : user -->

    <!-- input : database_password -->
    <div class="form-group row">
        <label for="database_password" class="col-sm-3 form-control-label text-right">Mot de passe</label>
        <div class="col-sm-9">
                <input type="text" name="server[database][password]" value="<?php echo $d['server']['database']['password'] ?? ''; ?>" class="form-control" id="database_password" placeholder="Mot de passe" />
        </div>
    </div>
    <!-- end input : database_password -->

    <!-- input : database_port -->
    <div class="form-group row">
        <label for="database_port" class="col-sm-3 form-control-label text-right">Port</label>
        <div class="col-sm-9">
                <input type="text" name="server[database][port]" value="<?php echo $d['server']['database']['port'] ?? ''; ?>" class="form-control" id="database_port" placeholder="Port" />
        </div>
    </div>
    <!-- end input : ftp_port -->
    </fieldset>

<fieldset>
    <legend>Local</legend>
    <!-- input : ftp_host -->
    <div class="form-group row">
            <label for="ftp_host" class="col-sm-3 form-control-label text-right">Hote</label>
            <div class="col-sm-9">
                <input type="text" name="local[database][host]" value="<?php echo $d['local']['database']['host'] ?? ''; ?>" class="form-control" id="database_host" placeholder="Hote">
        </div>
    </div>
    <!-- end input : database_host -->

    <!-- input : ftp_host -->
    <div class="form-group row">
            <label for="ftp_host" class="col-sm-3 form-control-label text-right">Basename</label>
            <div class="col-sm-9">
                <input type="text" name="local[database][basename]" value="<?php echo $d['local']['database']['basename'] ?? ''; ?>" class="form-control" id="database_host" placeholder="Basename">
        </div>
    </div>
    <!-- end input : database_host -->

    <!-- input : user -->
    <div class="form-group row">
        <label for="database_user" class="col-sm-3 form-control-label text-right">User</label>
        <div class="col-sm-9">
                <input type="text" name="local[database][user]" value="<?php echo $d['local']['database']['user'] ?? ''; ?>" class="form-control" id="database_user" placeholder="User" />
        </div>
    </div>
    <!-- end input : user -->

    <!-- input : database_password -->
    <div class="form-group row">
        <label for="database_password" class="col-sm-3 form-control-label text-right">Mot de passe</label>
        <div class="col-sm-9">
                <input type="text" name="local[database][password]" value="<?php echo $d['local']['database']['password'] ?? ''; ?>" class="form-control" id="database_password" placeholder="Mot de passe" />
        </div>
    </div>
    <!-- end input : database_password -->

    <!-- input : database_port -->
    <div class="form-group row">
        <label for="database_port" class="col-sm-3 form-control-label text-right">Port</label>
        <div class="col-sm-9">
                <input type="text" name="local[database][port]" value="<?php echo $d['local']['database']['port'] ?? ''; ?>" class="form-control" id="database_port" placeholder="Port" />
        </div>
    </div>
    <!-- end input : ftp_port -->
    <div class="btn-group col-sm-offset-3 col-sm-9">
        <a href="<?php $c->urlExec('app','db_test') ?>" class="btn btn-primary btn-sm btn-exec" data-form="#form-config" title="Test">Test</a>
        <a href="<?php $c->urlExec('app','db_create') ?>" class="btn btn-primary btn-sm btn-exec" data-form="#form-config" title="Create">Create</a>
    </div>

</fieldset>
