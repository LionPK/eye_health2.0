<div id="page-wrapper">
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><?=$title?></h3>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div role="tabpanel">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="advance">
                            <div class="dataTable_wrapper" style="overflow: auto;">
                            
                            <table id="admin_data" class="table table-bordered table-striped">  
                                <thead>  
                                      <tr>  
                                          <th>วัน & เวลา</th>
                                          <th>ชื่อ</th>
                                          <th>นามสกุล</th>
                                          <th>บทบาท</th>
                                          <th>อีเมล์</th>
                                          <th>แก้ไข</th>  
                                          <th>ลบ</th>  
                                      </tr>  
                                </thead> 
                            </table> 
                            </div>

                            <!-- /.table-responsive -->
                        </div>

                    
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>

<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <form method="post" id="admin_form">
    </form>
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
                    <input type="hidden" name="admin_id" id="admin_id" />
                    <input type="hidden" name="operation" id="operation" />  
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                    <button id="newUserSubmit" type="button" class="btn btn-primary">สร้าง</button>
                </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /button add -->
<div class="col-lg-12" style="position:fixed;bottom: 5%;left: 88%; width: 150px;text-align: center;border-radius: 100%;">
    <img id="add_button" class="add_user" src="<?=base_url()?>assets/images/add.png" data-toggle="modal" data-target="#adminModal" />
</div>


<!-- /#page-wrapper -->
<?php $this->load->view('frame/footer_view') ?>
<script src="<?=base_url()?>assets/js/view/user_list.js"></script>
<script type="text/javascript" language="javascript" >  
 $(document).ready(function() {
 
   //when click button add system reset form to empty and custom operation to Add 
      $('#add_button').click(function() {  
           $('#admin_form')[0].reset();  
           $('.modal-title').text("สร้างผู้ใช้ใหม่");  
           $('#action').val("สร้าง");
           $('#operation').val("Add");  
      })

      //load admin data to table from function fetch_admin
      var dataTable = $('#admin_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin1/fetch_admin'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[2,3,4,5,6],  
                     "orderable":false,  
                },  
           ],  
      });
      
        
      $(document).on('submit', '#admin_form', function(event){  
           event.preventDefault();  
           var name = $('#name').val();  
           var surname = $('#surname').val();
           var email = $('#email').val();  

           //check fields
           if(type != '' && name != '' && detail != '') {  
                $.ajax({  
                     url:"<?php echo base_url() . 'knowledge/knowledge_action'?>",  
                     method:'POST',  
                     data:new FormData(this),  
                     contentType:false,  
                     processData:false,  
                     success:function(data) {  
                          alert(data);  
                          $('#knowledge_form')[0].reset();  
                          $('#knowledgeModal').modal('hide');  
                          dataTable.ajax.reload();  
                     }  
                });  
           }else  {  
                alert("กรุณากรอกข้อมูลให้ครบตามที่ระบบร้องขอ");  
           }  
      });

      //call update then user click update   
      $(document).on('click', '.update', function(){  
           var admin_id = $(this).attr("id");
           $.ajax({  
                url:"<?php echo base_url(); ?>admin1/fetch_single_admin",  
                method:"POST",  
                data:{admin_id:admin_id},  
                dataType:"json",  
                success:function(data) {  
                     $('#adminModal').modal('show');  
                     $('#name').val(data.name);  
                     $('#surname').val(data.surname);
                     $('#email').val(data.email);  
                     $('.modal-title').text("แก้ไขข้อมูลเกล็ดความรู้");  
                     $('#admin_id').val(admin_id);  
                     $('#action').val("แก้ไข");
                     $('#operation').val("Edit");  
                }  
           })  
      }); 

      //call function delete when user click delete 
      $(document).on('click', '.delete', function() {
          //attr id equare id in file admin at function fetch_admin
           var id_admin = $(this).attr("id"); 

           //display message ofter user click comfirm system will call function to delete data
           if(confirm("คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้")) {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>admin1/delete_single_admin",   
                     method:"POST",  
                     data:{id_admin:id_admin},  
                     success:function(data) {  
                          alert(data);  
                          dataTable.ajax.reload();  
                     }  
                });  
           }else {  
                return false;       
           }  
      });  
 });  
 </script> 
