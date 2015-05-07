<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <p class="lead"><?php echo ucfirst($detail['first_name'].' '.$detail['last_name']);?></p>
            <div class="table-responsive">
                <table class="table">
                    <tbody><tr>
                        <th style="width:30%">First Name:</th>
                        <td><?php echo $detail['first_name'];?></td>
                        </tr>
                        <tr>
                            <th>Last Name:</th>
                            <td><?php echo $detail['last_name'];?></td>
                        </tr>
                        <tr>
                            <th>Username:</th>
                            <td><?php echo $detail['username'];?></td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td><?php echo $detail['gender'];?></td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><?php echo $detail['phone'];?></td>
                        </tr>
                        <tr>
                            <th>Status:</th>
                            <td>
                                <?php
                                    echo ($detail['is_active'] == 1) ? "<span class='label label-success'>Active</span>" : "<span class='label label-danger'>Inactive</span>";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Personal Email:</th>
                            <td><?php echo $detail['personal_email'];?></td>
                        </tr>
                        <tr>
                            <th>Company Email:</th>
                            <td><?php echo $detail['company_email'];?></td>
                        </tr>
                        <tr>
                            <th>Date of Birth:</th>
                            <td><?php echo $detail['date_of_birth'];?></td>
                        </tr>
                        <tr>
                            <th>Designation:</th>
                            <td><?php echo $detail['designation'];?></td>
                        </tr>
                        <tr>
                            <th>Office Number:</th>
                            <td><?php echo $detail['office_no'];?></td>
                        </tr>
                        <tr>
                            <?php
                            if($detail['is_active'] == 1)
                            {
                            ?>
                            <td>
                                <button onclick="confirm_deactive();" class="btn btn-danger">Deactivate User</button>
                            </td>
                            <?php
                            }
                            else
                            {
                            ?>
                            <td>
                                <button onclick="confirm_active();" class="btn btn-success">Activate User</button>
                            </td>
                            <?php
                            }
                            ?>
                            <td>
                                <a href="<?php echo base_url();?>/index.php/welcome/edit_user/<?php echo $detail['id'];?>" class="btn btn-success">Edit User</a>
                            </td>
                        </tr>
                    </tbody></table>
            </div>
        </div>
    </div>
</section><!-- /.content -->
<script>
function confirm_deactive()
{
    var url = '<?php echo base_url();?>/index.php/welcome/deactivate_user/<?php echo $detail['id'];?>';

    var r = confirm("Are you sure you want to deactivate this user?");
    if (r == true) {
        window.location = url;
    } else {

    }
}

function confirm_active()
{
    var url = '<?php echo base_url();?>/index.php/welcome/activate_user/<?php echo $detail['id'];?>';

    var r = confirm("Are you sure you want to activate this user?");
    if (r == true) {
        window.location = url;
    } else {

    }
}
</script>