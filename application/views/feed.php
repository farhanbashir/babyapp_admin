<section class="content-header">
    <h1>
        Feeds
<!--        <small>preview of simple tables</small>-->
    </h1>
<!--
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
    </ol>
-->
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
                            <th>Start Month</th>
                            <th>End Month</th>
                            <th>Feed</th>
                            <th>Feed Arabic</th>
                            <th>Intro</th>
                            <th>Intro Arabic</th>
                            <th>Milestone</th>
                            <!-- <th>Status</th>
                            <th>Description</th> -->
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach($feeds as $feed)
                        {
                        ?>
                        <tr>
                            <td><?php echo $feed['from'];?></td>
                            <td><?php echo $feed['to'];?></td>
                            <td><?php echo $feed['feed'];?></td>
                            <td><?php echo $feed['feed_ar'];?></td>
                            <td><?php echo $feed['intro'];?></td>
                            <td><?php echo $feed['intro_ar'];?></td>
                            <td><?php echo $feed['milestone_name'];?></td>
                            <!-- <td>
                                <?php
                                    echo ($feed['is_active'] == 1) ? "<span class='label label-success'>Active</span>" : "<span class='label label-danger'>Inactive</span>";
                                ?>
                            </td>
                            <td><?php echo $feed['description'];?></td> -->
                            <td>
                                <a href="<?php echo base_url();?>/index.php/welcome/feed_detail/<?php echo $feed['feed_id'];?>">View</a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="<?php echo base_url();?>/index.php/welcome/edit_feed/<?php echo $feed['feed_id'];?>">Edit</a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content