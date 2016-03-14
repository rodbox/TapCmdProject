<fieldset>
<legend>Server</legend>
    <!-- input : dir -->
    <div class="form-group row">
        <label for="dir" class="col-sm-2 form-control-label"><i class="fa fa-folder"></i> </label>
        <div class="col-sm-10">
                <input type="text" name="server[dir]" class="form-control" id="dir" placeholder="dir Server" value="<?php echo $d['server']['dir'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : dir -->
    <!-- input : web -->
    <div class="form-group row">
        <label for="web" class="col-sm-2 form-control-label"><i class="fa fa-link"></i> </label>
        <div class="col-sm-10">
                <input type="text" name="server[web]" class="form-control" id="web" placeholder="web server" value="<?php echo $d['server']['web'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : web -->
</fieldset>

<fieldset>
<legend>Local</legend>
    <!-- input : dir -->
    <div class="form-group row">
        <label for="dir" class="col-sm-2 form-control-label"><i class="fa fa-folder"></i></label>
        <div class="col-sm-10">
                <input type="text" name="local[dir]" class="form-control" id="dir" placeholder="dir Local" value="<?php echo $d['local']['dir'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : dir -->
    <!-- input : web -->
    <div class="form-group row">
        <label for="web" class="col-sm-2 form-control-label"><i class="fa fa-link"></i></label>
        <div class="col-sm-10">
                <input type="text" name="local[web]" class="form-control" id="web" placeholder="web server" value="<?php echo $d['local']['web'] ?? ''; ?>" />
        </div>
    </div>
    <!-- end input : web -->
</fieldset>


