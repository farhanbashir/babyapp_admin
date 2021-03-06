
<section class="content-header">
    <h1>
        Babies
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
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Parent</th>
                            <th>Birth Date</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach($babies as $baby)
                        {
                        ?>
                        <tr>
                            <td><?php echo $baby['baby_id'];?></td>
                            <td><?php echo $baby['first_name'];?></td>
                            <td><?php echo $baby['parent'];?></td>
                            <td><?php echo $baby['dob'];?></td>
                            <td><?php echo $baby['height'];?></td>
                            <td><?php echo $baby['weight'];?></td>
                            <td>
                                <?php
                                    echo ($baby['gender'] == 0) ? "Male" : "Female";
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url();?>/index.php/welcome/baby_detail/<?php echo $baby['baby_id'];?>">View</a>
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