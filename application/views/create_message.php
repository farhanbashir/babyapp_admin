<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-6">
            <p class="lead">SEND MESSAGE</p>
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
                                <form name="edit_message" id="edit_message" action="" method="POST" >
                                <input name="is_submit" id="is_submit" value="1" type="hidden" />
                                <input name="uniqid" id="uniqid" value="<?php echo $uniqid;?>" type="hidden" />
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="end_date">Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter ..."><?php echo set_value('feed', ''); ?></textarea>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </div>
                                </form>
                            </div>

            </div>
        </div>
    </div>
</section><!-- /.content -->
