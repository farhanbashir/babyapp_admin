<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-6">
            <p class="lead">Create Event</p>
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
                                <form name="create_event" id="create_event" action="" method="POST" onsubmit="return check_create_event();" enctype="multipart/form-data">
                                <input name="is_submit" id="is_submit" value="1" type="hidden" />
                                <input name="uniqid" id="uniqid" value="<?php echo $uniqid;?>" type="hidden" />
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" value="" id="name" name="name" placeholder="Name of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" value="" id="address" name="address" placeholder="Address of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="latitude">Latitude</label>
                                            <input type="text" class="form-control" value="" id="latitude" name="latitude" placeholder="Latitude of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="longitude">Longitude</label>
                                            <input type="text" class="form-control" value="" id="longitude" name="longitude" placeholder="Longitude of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="text" class="form-control" value="" id="start_date" name="start_date" placeholder="Start Date of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="text" class="form-control" value="" id="end_date" name="end_date" placeholder="End Date of event">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Event Image</label>
                                            <input type="file" id="image" name="image">
                                            <!-- <p class="help-block">Example block-level help text here.</p> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Status</label>
                                            <select name="is_active" class="form-control">
                                                <option value="0" >Inactive</option>
                                                <option value="1" >Active</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <input type="file" id="exampleInputFile">
                                            <p class="help-block">Example block-level help text here.</p>
                                        </div> -->
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Create Event</button>
                                    </div>
                                </form>
                            </div>

            </div>
        </div>
    </div>
</section><!-- /.content -->
<script>
function check_create_event()
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