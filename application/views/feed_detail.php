<!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <p class="lead">FEED # <?php echo ucfirst($detail['feed_id']);?></p>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Start Month:</th>
                            <td><?php echo $detail['from'];?></td>
                        </tr>
                        <tr>
                            <th>End Month:</th>
                            <td><?php echo $detail['to'];?></td>
                        </tr>
                        <tr>
                            <th>Milestone:</th>
                            <td><?php echo $detail['milestone_name'];?></td>
                        </tr>
                        <tr>
                            <th style="width:30%">Feed:</th>
                            <td><?php echo $detail['feed'];?></td>
                        </tr>
                        <tr>
                            <th style="width:30%">Feed Arabic:</th>
                            <td><?php echo $detail['feed_ar'];?></td>
                        </tr>
                        <tr>
                            <th>Intro:</th>
                            <td><?php echo $detail['intro'];?></td>
                        </tr>
                        <tr>
                            <th>Intro Arabic:</th>
                            <td><?php echo $detail['intro_ar'];?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="<?php echo base_url();?>/index.php/welcome/edit_feed/<?php echo $detail['feed_id'];?>" class="btn btn-success">Edit Feed</a>
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
    var url = '<?php echo base_url();?>/index.php/welcome/deactivate_event/<?php echo $detail['id'];?>';

    var r = confirm("Are you sure you want to deactivate this event?");
    if (r == true) {
        window.location = url;
    } else {

    }
}

function confirm_active()
{
    var url = '<?php echo base_url();?>/index.php/welcome/activate_event/<?php echo $detail['id'];?>';

    var r = confirm("Are you sure you want to activate this event?");
    if (r == true) {
        window.location = url;
    } else {

    }
}
</script>