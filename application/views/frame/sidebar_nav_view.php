<div class="navbar-default sidebar" role="navigation">
<div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li>
            <?php echo '<p class="welcome"><b> <text style="font-size:150%;">&#9786</text> <i>ยินดีต้อนรับ </i>' . $this->session->userdata('name') . "!</b></p>"; ?>
        </li>
        <li>
            <a href="<?=base_url()?>"><i class="fa fa-home fa-fw"></i> แดชบอร์ด</a>
        </li>
        <?php if($this->session->userdata('role') == 'admin'): ?>
            <!-- /manage admin menu -->
            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> ผู้ดูแลระบบ<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="<?=base_url('admin/user_list')?>">&raquo; รายชื่อผู้ดูแล</a> </li>
                    <li> <a href="<?=base_url('admin1/admin_list')?>">&raquo; รายชื่อผู้ดูแล(modify function)</a> </li>
                    <li> <a href="<?=base_url('admin/activity_log')?>">&raquo; บันทึกกิจกรรม</a> </li>
                </ul>
            </li>

            <!-- /manage user menu -->
            <li>
                <a href="#"><i class="fa fa-android fa-fw"></i> ผู้ใช้งานระบบ<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li> <a href="<?=base_url('user/users_list')?>">&raquo; รายชื่อผู้ใช้งานระบบ</a> </li>
                    <li> <a href="<?=base_url('user1/users_list')?>">&raquo; รายชื่อผู้ใช้งานระบบ(modify function)</a> </li>
                    <li> <a href="<?=base_url('factor/factor_list')?>">&raquo; ข้อมูลปัจจัยนำเข้า </a> </li>
                </ul>
            </li>

            <!-- /manage knowledge menu -->
            <li>
                <a href='<?=base_url('knowledge/knowledge_list')?>'><i class="fa fa-file fa-fw"></i> เกร็ดความรู้</a>
            </li>
        <?php endif; ?>

        <li>
            <a href="#"><i class="fa fa-user fa-fw"></i> Other Menu Sample<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li> <a href="<?=base_url('crud/index')?>">&raquo; Other Sub Menu 1</a> </li>
                <li> <a href="<?=base_url('knowlage')?>">&raquo; Other Sub Menu 2</a> </li>
            </ul>
        </li>
  
        
    </ul>
</div>
<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>