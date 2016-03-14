<fieldset>
<legend>Server</legend>
    <!-- input : mail_host -->
    <div class="form-group row">
            <label for="mail_host" class="col-sm-3 form-control-label text-right">Hote</label>
            <div class="col-sm-9">
                <input type="text" name="server[mail][host]" class="form-control" id="mail_host" placeholder="Hote"
                value="<?php echo $d['server']['mail']['host'] ?? ''; ?>">
        </div>
    </div>
    <!-- end input : mail_host -->

    <!-- input : user -->
    <div class="form-group row">
        <label for="mail_user" class="col-sm-3 form-control-label text-right">User</label>
        <div class="col-sm-9">
                <input type="text" name="server[mail][user]" class="form-control" id="mail_user" placeholder="User"
                value="<?php echo $d['server']['mail']['user'] ?? ''; ?>"  />
        </div>
    </div>
    <!-- end input : user -->

    <!-- input : mail_password -->
    <div class="form-group row">
        <label for="mail_password" class="col-sm-3 form-control-label text-right">Mot de passe</label>
        <div class="col-sm-9">
                <input type="text" name="server[mail][password]" class="form-control" id="mail_password" placeholder="Mot de passe"
                value="<?php echo $d['server']['mail']['password'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : mail_password -->

    <!-- input : mail_port -->
    <div class="form-group row">
        <label for="mail_port" class="col-sm-3 form-control-label text-right">Transport</label>
        <div class="col-sm-9">
                <input type="text" name="server[mail][transport]" class="form-control" id="mail_port" placeholder="Transport"
                value="<?php echo $d['server']['mail']['transport'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : mail_port -->
</fieldset>


<fieldset>
<legend>Local</legend>
    <!-- input : mail_host -->
    <div class="form-group row">
            <label for="mail_host" class="col-sm-3 form-control-label text-right">Hote</label>
            <div class="col-sm-9">
                <input type="text" name="local[mail][host]" class="form-control" id="mail_host" placeholder="Hote"
                value="<?php echo $d['local']['mail']['host'] ?? ''; ?>">
        </div>
    </div>
    <!-- end input : mail_host -->

    <!-- input : user -->
    <div class="form-group row">
        <label for="mail_user" class="col-sm-3 form-control-label text-right">User</label>
        <div class="col-sm-9">
                <input type="text" name="local[mail][user]" class="form-control" id="mail_user" placeholder="User"
                value="<?php echo $d['local']['mail']['user'] ?? ''; ?>"  />
        </div>
    </div>
    <!-- end input : user -->

    <!-- input : mail_password -->
    <div class="form-group row">
        <label for="mail_password" class="col-sm-3 form-control-label text-right">Mot de passe</label>
        <div class="col-sm-9">
                <input type="text" name="local[mail][password]" class="form-control" id="mail_password" placeholder="Mot de passe"
                value="<?php echo $d['local']['mail']['password'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : mail_password -->

    <!-- input : mail_port -->
    <div class="form-group row">
        <label for="mail_port" class="col-sm-3 form-control-label text-right">Transport</label>
        <div class="col-sm-9">
                <input type="text" name="local[mail][transport]" class="form-control" id="mail_port" placeholder="Transport"
                value="<?php echo $d['local']['mail']['transport'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : mail_port -->
</fieldset>
