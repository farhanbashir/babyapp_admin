<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-6">
            <p class="lead"><?php echo ucfirst($detail['name']);?></p>
            <?php
            if($error != "")
            {
            ?>    
            <div class="alert alert-danger alert-dismissable">
                <i class="fa fa-ban"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <b>Alert!</b> <?php echo $error;?>
            </div>
                
            <?php
            }    
            ?>
            <div class="table-responsive">

                <div class="box box-primary">

                                <!-- form start -->
                                <form name="edit_event" id="edit_event" action="" method="POST" onsubmit="return check_edit_event();" enctype="multipart/form-data">
                                <input name="is_submit" id="is_submit" value="1" type="hidden" />
                                <input name="uniqid" id="uniqid" value="<?php echo $uniqid;?>" type="hidden" />
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['name'];?>" id="name" name="name" placeholder="Name of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['address'];?>" id="address" name="address" placeholder="Address of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="latitude">Latitude</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['latitude'];?>" id="latitude" name="latitude" placeholder="Latitude of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="longitude">Longitude</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['longitude'];?>" id="longitude" name="longitude" placeholder="Longitude of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="created_date">Created Date</label>
                                            <input type="text" class="form-control" disabled value="<?php echo $detail['created_date'];?>" id="created_date" name="created_date" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="user">Creator</label>
                                            <input type="text" class="form-control" value="<?php echo ucfirst($detail['first_name'].' '.$detail['last_name']);?>" disabled id="user" name="user" placeholder="Creator of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['start_date'];?>" id="start_date" name="start_date" placeholder="Start Date of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['end_date'];?>" id="end_date" name="end_date" placeholder="End Date of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Event Image</label>
                                            <input type="file" id="image" name="image">
                                            <?php
                                            if($detail['image'] != "")
                                            {    
                                            ?>
                                            <p class="help-block">
                                                <img width="300" height="300" src="<?php echo $detail['image'];?>" />
                                            </p>
                                            <?php
                                            }    
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Status</label>
                                            <select name="is_active" class="form-control">
                                                <option value="0" <?php echo ($detail['is_active'] == 0) ? 'selected' : '';?>>Inactive</option>
                                                <option value="1" <?php echo ($detail['is_active'] == 1) ? 'selected' : '';?>>Active</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter ..."><?php echo $detail['description'];?></textarea>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" id="exampleInputFile">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div> -->
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Edit Event</button>
                                    </div>
                                </form>
                            </div>

            </div>
        </div>
    </div>
</section><!-- /.content -->
<script>
function check_edit_event()
{
    var count = 0;

    if($('#name').val() == '')
    {
        count++;
        $('#name').parent().addClass('has-error');
    }

    if($('#address').val() == '')
    {
        count++;
        $('#address').parent().addClass('has-error');
    }

    if($('#latitude').val() == '')
    {
        count++;
        $('#latitude').parent().addClass('has-error');
    }

    if($('#longitude').val() == '')
    {
        count++;
        $('#longitude').parent().addClass('has-error');
    }

    if($('#start_date').val() == '')
    {
        count++;
        $('#start_date').parent().addClass('has-error');
    }

    if($('#end_date').val() == '')
    {
        count++;
        $('#end_date').parent().addClass('has-error');
    }

    if($('#description').val() == '')
    {
        count++;
        $('#description').parent().addClass('has-error');
    }


    if(count == 0)
        return true;
    else
        return false;
}
</script>