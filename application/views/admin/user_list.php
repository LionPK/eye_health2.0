<!-- // -->
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><?=$title?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            <?php endif;?>
            <div class="row">
                <div class="col-lg-12">      
                    <!-- <table class="table table-striped table-bordered table-hover" id="dataTables-user-list"> -->
                    <table class="table table-bordered table-responsive" style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th>วัน & เวลา</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>บทบาท</th>
                                <th>อีเมล์</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users  as $row): ?>
                            <tr>
                                <td><?php echo $row->created_at; ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->surname; ?></td>
                                <td><?php echo $row->role; ?></td>  
                                <td><?php echo $row->email; ?></td>
                                
                                <td>
                                    <a class="btn btn-primary btn-xs" id="user-edit"  onclick="edit_user_popup('<?=$row->email?>','<?=$row->user_id?>','<?=$row->name?>','<?=$row->surname?>');" data-toggle="modal" data-target="#editUser"> แก้ไข </a>
                                    <a class="btn btn-danger btn-xs" id="user-delete" onclick="deactivate_confirmation('<?=$row->email?>','<?=$row->user_id?>');" data-toggle="modal" data-target="#deactivateConfirm"> ลบ </a>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>

                    <div class="col-lg-12" style="position:fixed;bottom: 5%;left: 88%; width: 150px;text-align: center;border-radius: 100%;">
                        <img class="add_user" src="<?=base_url()?>assets/images/add.png" data-toggle="modal" data-target="#addUser" />
                    </div>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>



        <!-- Modal -->
        <div class="modal fade" id="deactivateConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">ยืนยันการลบข้อมูล</h4>
                    </div>
                    <div class="modal-body">
                        <label>คุณกำลังจะลบการใช้งาน <label id="user-email" style="color:blue;"></label>.</label><br/>
                        <label>คลิก <b>ตกลง</b> เพื่อดำเนินการต่อไป</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                        <a id="deactivateYesButton" class="btn btn-danger" >ตกลง</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">สร้างผู้ใช้ใหม่</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ชื่อ</label> &nbsp;&nbsp;
                                    <label class="error" id="error_name"> ต้องระบุ</label>
                                    <label class="error" id="error_name2"> ชื่อต้องเป็นตัวเลขและตัวอักษร</label>
                                    <input class="form-control" id="name" placeholder="Name" name="name" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>นามสกุล</label> &nbsp;&nbsp;
                                    <label class="error" id="error_surname"> ต้องระบุ</label>
                                    <input class="form-control" id="surname" placeholder="surname" name="surname" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>อีเมล์</label> &nbsp;&nbsp;
                                    <label class="error" id="error_email"> ต้องระบุ</label>
                                    <label class="error" id="error_email2"> มีอีเมล์อยู่แล้ว</label>
                                    <label class="error" id="error_email3"> ที่อยู่อีเมล์ที่ไม่ถูกต้อง.</label>
                                    <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" autofocus>
                                </div> 
                            </div>
                      </div>                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                        <button id="newUserSubmit" type="button" class="btn btn-primary">สร้าง</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">ปรับปรุงข้อมูลผู้ใช้งาน</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden"  id="edit-user-id" value=""/>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>ชื่อ</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_name"> ต้องระบุ</label>
                                    <label class="error" id="edit-error_name2"> ชื่อต้องเป็นตัวเลขและตัวอักษร</label>
                                    <input class="form-control" id="edit-name" placeholder="Name" name="edit-name" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>นามสกุล</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_surname"> ต้องระบุ</label>
                                    <!-- <label class="error" id="edit-error_name2"> ชื่อต้องเป็นตัวเลขและตัวอักษร</label> -->
                                    <input class="form-control" id="edit-surname" placeholder="surname" name="edit-surname" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>อีเมล์</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_email"> ต้องระบุ</label>
                                    <label class="error" id="edit-error_email2"> มีอีเมล์อยู่แล้ว</label>
                                    <label class="error" id="edit-error_email3"> ที่อยู่อีเมล์ที่ไม่ถูกต้อง.</label>
                                    <input class="form-control" id="edit-email" placeholder="E-mail" name="edit-email" type="email" autofocus>
                                </div> 
                            </div>
                      </div>      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                        <button id="editUserSubmit" type="button" class="btn btn-primary">ปรับปรุง</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
       
        <!-- /#page-wrapper -->
        <?php $this->load->view('frame/footer_view')?>
        <script src="<?=base_url()?>assets/js/view/user_list.js"></script>