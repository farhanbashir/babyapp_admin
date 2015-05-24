<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <p class="lead"><?php echo ucfirst($detail['first_name']);?></p>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Id:</th>
                            <td><?php echo $detail['baby_id'];?></td>
                        </tr>
                        <tr>
                            <th>Parent:</th>
                            <td><a href="<?php echo base_url();?>/index.php/welcome/parent_detail/<?php echo $detail['user_id'];?>"><?php echo $detail['parent'];?></a></td>
                        </tr>
                        <tr>
                            <th style="width:30%">First Name:</th>
                            <td><?php echo $detail['first_name'];?></td>
                        </tr>
                        <tr>
                            <th>Birth Date:</th>
                            <td><?php echo $detail['dob'];?></td>
                        </tr>
                        <tr>
                            <th>Height:</th>
                            <td><?php echo $detail['height'];?></td>
                        </tr>
                        <tr>
                            <th>Weight:</th>
                            <td><?php echo $detail['weight'];?></td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td>
                                <?php
                                    echo ($detail['gender'] == 0) ? "Male" : "Female";
                                ?>
                            </td>
                        </tr>
                        <!-- <tr>
                            <?php
                            if($detail['is_active'] == 1)
                            {
                            ?>
                            <td colspan="2">
                                <button onclick="confirm_deactive();" class="btn btn-danger">Deactivate Parent</button>
                            </td>
                            <?php
                            }
                            else
                            {
                            ?>
                            <td colspan="2">
                                <button onclick="confirm_active();" class="btn btn-success">Activate Parent</button>
                            </td>
                            <?php
                            }
                            ?>
                        </tr> -->
                    </tbody></table>
            </div>
        </div>
    </div>
</section><!-- /.content -->
<script>
function confirm_deactive()
{
    var url = '<?php echo base_url();?>/index.php/welcome/deactivate_user/<?php echo $detail['user_id'];?>';

    var r = confirm("Are you sure you want to deactivate this Parent?");
    if (r == true) {
        window.location = url;
    } else {

    }
}

function confirm_active()
{
    var url = '<?php echo base_url();?>/index.php/welcome/activate_user/<?php echo $detail['user_id'];?>';

    var r = confirm("Are you sure you want to activate this Parent?");
    if (r == true) {
        window.location = url;
    } else {

    }
}
</script>