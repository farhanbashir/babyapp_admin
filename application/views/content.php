<!--Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>
                        <?php echo $total_events;?>
                    </h3>
                    <p>
                        Total Events
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <!-- <div class="small-box bg-green">
                <div class="inner">
                    <h3>
                        53<sup style="font-size: 20px">%</sup>
                    </h3>
                    <p>
                        Previous Events Stats
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div> -->
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>
                        <?php echo $total_users;?>
                    </h3>
                    <p>
                        Total Users
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <!-- <div class="small-box bg-red">
                <div class="inner">
                    <h3>
                        65
                    </h3>
                    <p>
                        Unique Visitors
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div> -->
        </div><!-- ./col -->
    </div><!-- /.row -->

    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Latest Five Events</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table table-condensed">
                                        <tbody><tr>
                                            <th style="width: 10px">#</th>
                                            <th>Task</th>
                                            <th>Start Date</th>
                                            <th>Status</th>
                                            <th style="width: 40px">View</th>
                                        </tr>
                                        <?php
                                        $i=0;
                                        foreach($latest_five_events as $event)
                                        {
                                            $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $event['name'];?></td>
                                            <td><?php echo date('F j, Y',strtotime($event['start_date']));?></td>
                                            <td>
                                                <?php
                                                    echo ($event['is_active'] == 1) ? "<span class='label label-success'>Active</span>" : "<span class='label label-danger'>Inactive</span>";
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>/index.php/welcome/event_detail/<?php echo $event['id'];?>">View</a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody></table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


                        </div><!-- /.col -->
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Latest Five Users</h3>

                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <table class="table">
                                        <tbody><tr>
                                            <th style="width: 10px">#</th>
                                            <th>Name</th>
                                            <th>Company Name</th>
                                            <th>Status</th>
                                            <th style="width: 40px">View</th>
                                        </tr>
                                        <?php
                                        $i=0;
                                        foreach($latest_five_users as $user)
                                        {
                                            $i++;
                                        ?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo ucfirst($user['first_name'].' '.$user['last_name']);?></td>
                                            <td><?php echo $user['company_name'];?></td>
                                            <td>
                                                <?php
                                                    echo ($user['is_active'] == 1) ? "<span class='label label-success'>Active</span>" : "<span class='label label-danger'>Inactive</span>";
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url();?>/index.php/welcome/user_detail/<?php echo $user['id'];?>">View</a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody></table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->


                        </div><!-- /.col -->
                    </div>

    <!-- Main row -->


</section>
<!-- /.content