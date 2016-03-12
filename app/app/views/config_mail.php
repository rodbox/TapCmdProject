<fieldset>
    <!-- input : mail_host -->
    <div class="form-group row">
            <label for="mail_host" class="col-sm-3 form-control-label text-right">Hote</label>
            <div class="col-sm-9">
                <input type="text" name="mail[host]" class="form-control" id="mail_host" placeholder="Hote"
                value="<?php echo $d['mail']['host'] ?? ''; ?>">
        </div>
    </div>
    <!-- end input : mail_host -->

    <!-- input : user -->
    <div class="form-group row">
        <label for="mail_user" class="col-sm-3 form-control-label text-right">User</label>
        <div class="col-sm-9">
                <input type="text" name="mail[user]" class="form-control" id="mail_user" placeholder="User"
                value="<?php echo $d['mail']['user'] ?? ''; ?>"  />
        </div>
    </div>
    <!-- end input : user -->

    <!-- input : mail_password -->
    <div class="form-group row">
        <label for="mail_password" class="col-sm-3 form-control-label text-right">Mot de passe</label>
        <div class="col-sm-9">
                <input type="text" name="mail[password]" class="form-control" id="mail_password" placeholder="Mot de passe"
                value="<?php echo $d['mail']['password'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : mail_password -->

    <!-- input : mail_port -->
    <div class="form-group row">
        <label for="mail_port" class="col-sm-3 form-control-label text-right">Transport</label>
        <div class="col-sm-9">
                <input type="text" name="mail[transport]" class="form-control" id="mail_port" placeholder="Transport"
                value="<?php echo $d['mail']['transport'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : mail_port -->
    </fieldset>
