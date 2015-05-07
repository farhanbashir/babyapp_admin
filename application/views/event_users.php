
<section class="content-header">
    <h1>
        Event Users
<!--        <small>preview of simple tables</small>-->
    </h1>

</section>

<!-- Main content -->
<section class="content">
    
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
<!--                    <h3 class="box-title">Sample Table</h3>-->
                    <!-- <div class="box-tools">
                        <div class="input-group">
                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div> -->
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>User Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach($event_users as $event_user)
                        {
                        ?>    
                        <tr>
                            <td><?php echo $event_user['first_name'].' '.$event_user['last_name'];?></td>
                            <td><span class="label label-success">Approved</span></td>
                            <td>
                                <a href="<?php echo base_url();?>/index.php/welcome/user_detail/<?php echo $event_user['user_id'];?>">View Profile</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
<!--
                        <tr>
                            <td>219</td>
                            <td>Jane Doe</td>
                            <td>11-7-2014</td>
                            <td>11-7-2014</td>
                            <td>11-7-2014</td>
                            <td><span class="label label-warning">Pending</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                        <tr>
                            <td>657</td>
                            <td>Bob Doe</td>
                            <td>11-7-2014</td>
                            <td>11-7-2014</td>
                            <td>11-7-2014</td>
                            <td><span class="label label-primary">Approved</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                        <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>Mike Doe</td>
                            <td>Mike Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="label label-danger">Denied</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
-->
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content