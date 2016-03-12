<fieldset>
    <!-- input : ftp_host -->
    <div class="form-group row">
            <label for="ftp_host" class="col-sm-3 form-control-label text-right">Hote</label>
            <div class="col-sm-9">
                <input type="text" name="config[database][host]" class="form-control" id="database_host" placeholder="Hote">
        </div>
    </div>
    <!-- end input : database_host -->

    <!-- input : user -->
    <div class="form-group row">
        <label for="database_user" class="col-sm-3 form-control-label text-right">User</label>
        <div class="col-sm-9">
                <input type="text" name="config[database][user]" class="form-control" id="database_user" placeholder="User" />
        </div>
    </div>
    <!-- end input : user -->

    <!-- input : database_password -->
    <div class="form-group row">
        <label for="database_password" class="col-sm-3 form-control-label text-right">Mot de passe</label>
        <div class="col-sm-9">
                <input type="text" name="config[database][password]" class="form-control" id="database_password" placeholder="Mot de passe" />
        </div>
    </div>
    <!-- end input : database_password -->

    <!-- input : database_port -->
    <div class="form-group row">
        <label for="database_port" class="col-sm-3 form-control-label text-right">Port</label>
        <div class="col-sm-9">
                <input type="text" name="config[database][port]" class="form-control" id="database_port" placeholder="Port" />
        </div>
    </div>
    <!-- end input : ftp_port -->
    </fieldset>

</form>