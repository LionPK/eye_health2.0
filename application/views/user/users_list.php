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
                                    <a class="btn btn-warning btn-xs" id="users-riset" onclick="reset_confirmation('<?=$row->email?>','<?=$row->id?>')" data-toggle="modal" data-target="#resetConfirm"> รีเซ็ต </a>                                    
                                </td>

                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="resetConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">ยืนยันการรีเซ็ต</h4>
                    </div>
                    <div class="modal-body">
                        <label>คุณจะรีเซ็ตรหัสผ่านของผู้ใช้ <label id="reset-users-email" style="color:blue;"></label>.</label><br/>
                        <label>รหัสผ่านชั่วคราวจะถูกส่งไปที่อีเมลนี้</label><br/>
                        <label>คลิก <b>ตกลง</b> เพื่อดำเนินการต่อไป</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                        <a id="resetYesButton" class="btn btn-warning" >ตกลง</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
       
        <!-- /#page-wrapper -->
        <?php $this->load->view('frame/footer_view')?>
        <script src="<?=base_url()?>assets/js/view/users.list.js"></script>