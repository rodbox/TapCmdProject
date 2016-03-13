<fieldset>
    <!-- input : ftp_host -->
    <div class="form-group row">
            <label for="ftp_host" class="col-sm-3 form-control-label text-right">Hote</label>
            <div class="col-sm-9">
                <input type="text" name="database[host]" value="<?php echo $d['database']['host'] ?? ''; ?>" class="form-control" id="database_host" placeholder="Hote">
        </div>
    </div>
    <!-- end input : database_host -->

    <!-- input : ftp_host -->
    <div class="form-group row">
            <label for="ftp_host" class="col-sm-3 form-control-label text-right">Basename</label>
            <div class="col-sm-9">
                <input type="text" name="database[basename]" value="<?php echo $d['database']['basename'] ?? ''; ?>" class="form-control" id="database_host" placeholder="Basename">
        </div>
    </div>
    <!-- end input : database_host -->

    <!-- input : user -->
    <div class="form-group row">
        <label for="database_user" class="col-sm-3 form-control-label text-right">User</label>
        <div class="col-sm-9">
                <input type="text" name="database[user]" value="<?php echo $d['database']['user'] ?? ''; ?>" class="form-control" id="database_user" placeholder="User" />
        </div>
    </div>
    <!-- end input : user -->

    <!-- input : database_password -->
    <div class="form-group row">
        <label for="database_password" class="col-sm-3 form-control-label text-right">Mot de passe</label>
        <div class="col-sm-9">
                <input type="text" name="database[password]" value="<?php echo $d['database']['password'] ?? ''; ?>" class="form-control" id="database_password" placeholder="Mot de passe" />
        </div>
    </div>
    <!-- end input : database_password -->

    <!-- input : database_port -->
    <div class="form-group row">
        <label for="database_port" class="col-sm-3 form-control-label text-right">Port</label>
        <div class="col-sm-9">
                <input type="text" name="database[port]" value="<?php echo $d['database']['port'] ?? ''; ?>" class="form-control" id="database_port" placeholder="Port" />
        </div>
    </div>
    <!-- end input : ftp_port -->
    </fieldset>
