<!-- input : title -->
<div class="form-group row">
    <label for="titleTitle" class="col-sm-2 form-control-label">Title</label>
    <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="titleTitle" placeholder="Title" value="<?php echo $d['title'] ?? '';?>" />
    </div>
</div>
<!-- end input : title -->


<!-- input : contact -->
<div class="form-group row">
    <label for="contactContact" class="col-sm-2 form-control-label">Contact</label>
    <div class="col-sm-10">
            <input type="text" name="contact" class="form-control" id="contactContact" placeholder="Contact" value="<?php echo $d['contact'] ?? '';?>" />
    </div>
</div>
<!-- end input : contact -->

<!-- input : phone -->
<div class="form-group row">
    <label for="phonePhone" class="col-sm-2 form-control-label">Phone</label>
    <div class="col-sm-10">
            <input type="text" name="phone" class="form-control" id="phonePhone" placeholder="Phone" value="<?php echo $d['phone'] ?? '';?>" />
    </div>
</div>
<!-- end input : phone -->

