<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo asset_img('avatar3.png');?>" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>Hello, Admin</p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
<!--
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
-->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="active">
            <a href="<?php echo base_url();?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="active">
            <a href="<?php echo site_url('welcome/user') ?>">
                <i class="fa fa-dashboard"></i> <span>Users</span>
            </a>
        </li>
        <!-- <li class="active">
            <a href="<?php echo site_url('welcome/event') ?>">
                <i class="fa fa-dashboard"></i> <span>Events</span>
            </a>
        </li> -->
        <li class="treeview">
            <a href="#">
                <i class="fa fa-edit"></i> <span>Events</span>
                <i class="fa pull-right fa-angle-down"></i>
            </a>
            <ul class="treeview-menu" style="display: block;">
                <li><a href="<?php echo site_url('welcome/event') ?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i> Events List</a></li>
                <li><a href="<?php echo site_url('welcome/create_event') ?>" style="margin-left: 10px;"><i class="fa fa-angle-double-right"></i>Create Event</a></li>
            </ul>
        </li>
    </ul>
</section>