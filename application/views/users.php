
<section class="content-header">
    <h1>
        Users
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
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Company Name</th>
                            <th>Personal Email</th>
                            <th>Company Email</th>
                            <th>Status</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach($users as $user)
                        {
                        ?>
                        <tr>
                            <td><?php echo $user['username'];?></td>
                            <td><?php echo $user['first_name'];?></td>
                            <td><?php echo $user['last_name'];?></td>
                            <td><?php echo $user['phone'];?></td>
                            <td><?php echo $user['company_name'];?></td>
                            <td><?php echo $user['personal_email'];?></td>
                            <td><?php echo $user['company_email'];?></td>
                            <td>
                                <?php
                                    echo ($user['is_active'] == 1) ? "<span class='label label-success'>Active</span>" : "<span class='label label-danger'>Inactive</span>";
                                ?>
                            </td>
                            <td><?php echo $user['designation'];?></td>
                            <td>
                                <a href="<?php echo base_url();?>/index.php/welcome/user_detail/<?php echo $user['id'];?>">View</a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="<?php echo base_url();?>/index.php/welcome/edit_user/<?php echo $user['id'];?>">Edit</a>
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