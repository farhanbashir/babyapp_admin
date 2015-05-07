<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-6">
            <p class="lead"><?php echo ucfirst($detail['first_name'].' '.$detail['last_name']);?></p>
            <div class="table-responsive">

                <div class="box box-primary">

                                <!-- form start -->
                                <form name="edit_event" id="edit_event" action="" method="POST" onsubmit="return check_edit_user();">
                                <input name="is_submit" id="is_submit" value="1" type="hidden" />
                                <input name="uniqid" id="uniqid" value="<?php echo $uniqid;?>" type="hidden" />
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="name">First Name</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['first_name'];?>" id="first_name" name="first_name" placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Last Name</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['last_name'];?>" id="last_name" name="last_name" placeholder="Last Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Username</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['username'];?>" id="username" disabled name="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Phone</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['phone'];?>" id="phone" name="phone" placeholder="Phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Office Phone</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['office_no'];?>" id="office_no" name="office_no" placeholder="Office Phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="created_date">Created Date</label>
                                            <input type="text" class="form-control" disabled value="<?php echo $detail['created'];?>" id="created_date" name="created_date" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="user">Personal Email</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['personal_email'];?>" disabled id="personal_email" name="personal_email" placeholder="Personal Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="user">Company Email</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['company_email'];?>" disabled id="company_email" name="company_email" placeholder="Company Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="start_date">Designation</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['designation'];?>" id="designation" name="designation" placeholder="Designation">
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Company</label>
                                            <input type="text" class="form-control" value="<?php echo $detail['company_name'];?>" id="company_name" name="company_name" placeholder="Company Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="end_date">Status</label>
                                            <select name="is_active" class="form-control">
                                                <option value="0" <?php echo ($detail['is_active'] == 0) ? 'selected' : '';?>>Inactive</option>
                                                <option value="1" <?php echo ($detail['is_active'] == 1) ? 'selected' : '';?>>Active</option>
                                            </select>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Edit User</button>
                                    </div>
                                </form>
                            </div>

            </div>
        </div>
    </div>
</section><!-- /.content -->
<script>
function check_edit_user()
{
    var count = 0;

    if($('#first_name').val() == '')
    {
        count++;
        $('#first_name').parent().addClass('has-error');
    }

    if($('#last_name').val() == '')
    {
        count++;
        $('#last_name').parent().addClass('has-error');
    }

    if($('#phone').val() == '')
    {
        count++;
        $('#phone').parent().addClass('has-error');
    }

    if($('#office_no').val() == '')
    {
        count++;
        $('#office_no').parent().addClass('has-error');
    }

    if($('#designation').val() == '')
    {
        count++;
        $('#designation').parent().addClass('has-error');
    }

    if($('#company_name').val() == '')
    {
        count++;
        $('#company_name').parent().addClass('has-error');
    }

    if(count == 0)
        return true;
    else
        return false;


}
</script>