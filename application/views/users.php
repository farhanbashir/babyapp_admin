
<section class="content-header">
    <h1>
        Parents
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
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Birth Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach($users as $user)
                        {
                        ?>
                        <tr>
                            <td><?php echo $user['user_id'];?></td>
                            <td><?php echo $user['first_name'];?></td>
                            <td><?php echo $user['last_name'];?></td>
                            <td><?php echo $user['email'];?></td>
                            <td>
                                <?php
                                    echo ($user['gender'] == 0) ? "Male" : "Female";
                                ?>
                            </td>
                            <td><?php echo $user['dob'];?></td>
                            <td>
                                <?php
                                    echo ($user['is_active'] == 1) ? "<span class='label label-success'>Active</span>" : "<span class='label label-danger'>Inactive</span>";
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url();?>/index.php/welcome/parent_detail/<?php echo $user['user_id'];?>">View</a>
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
    <div class="row">
        <div class="col-sm-12"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <?php echo $links;?>
        </div></div>
    </div>
</section><!-- /.content