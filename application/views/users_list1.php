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
                            
                            <table id="user_data" class="table table-bordered table-striped">  
                                <thead>  
                                      <tr>  
                                          <th>วัน & เวลา</th>
                                          <th>ชื่อ</th>
                                          <th>นามสกุล</th>
                                          <th>บทบาท</th>
                                          <th>อีเมล์</th>
                                          <!-- <th>รีเซ็ท</th>     -->
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

<!-- /#page-wrapper -->
<?php $this->load->view('frame/footer_view') ?>
<script type="text/javascript" language="javascript" >  
 $(document).ready(function() {
 
   //when click button add system reset form to empty and custom operation to Add 
    //   $('#add_button').click(function() {  
    //        $('#knowledge_form')[0].reset();  
    //        $('.modal-title').text("เพิ่มข้อมูลเกล็ดความรู้");  
    //        $('#action').val("เพิ่ม");
    //        $('#operation').val("Add");  
    //        $('#knowledge_uploaded_image').html('');  
    //   })

      //load knowledge data to table from function fetch_knowledge
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'user1/fetch_user'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[2,3,4],  
                     "orderable":false,  
                },  
           ],  
      });
      
        
    //   $(document).on('submit', '#knowledge_form', function(event){  
    //        event.preventDefault();  
    //        var type = $('#type').val();  
    //        var name = $('#name').val();
    //        var detail = $('#detail').val();  
    //        var extension = $('#knowledge_image').val().split('.').pop().toLowerCase();

    //        if(extension != '') {  
    //             //check type of pictures
    //             if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1) {  
    //                  alert("ไฟล์รูปภาพไม่ถูกต้อง");  
    //                  $('#knowledge_image').val('');  
    //                  return false;  
    //             }  
    //        }

    //        //check fields
    //        if(type != '' && name != '' && detail != '') {  
    //             $.ajax({  
    //                  url:"<?php echo base_url() . 'knowledge/knowledge_action'?>",  
    //                  method:'POST',  
    //                  data:new FormData(this),  
    //                  contentType:false,  
    //                  processData:false,  
    //                  success:function(data) {  
    //                       alert(data);  
    //                       $('#knowledge_form')[0].reset();  
    //                       $('#knowledgeModal').modal('hide');  
    //                       dataTable.ajax.reload();  
    //                  }  
    //             });  
    //        }else  {  
    //             alert("กรุณากรอกข้อมูลให้ครบตามที่ระบบร้องขอ");  
    //        }  
    //   });

    //   //call update then user click update   
    //   $(document).on('click', '.update', function(){  
    //        var knowledge_id = $(this).attr("id");  
    //        $.ajax({  
    //             url:"<?php echo base_url(); ?>knowledge/fetch_single_knowledge",  
    //             method:"POST",  
    //             data:{knowledge_id:knowledge_id},  
    //             dataType:"json",  
    //             success:function(data) {  
    //                  $('#knowledgeModal').modal('show');  
    //                  $('#type').val(data.type);  
    //                  $('#name').val(data.name);
    //                  $('#detail').val(data.detail);  
    //                  $('.modal-title').text("แก้ไขข้อมูลเกล็ดความรู้");  
    //                  $('#knowledge_id').val(knowledge_id);  
    //                  $('#knowledge_uploaded_image').html(data.knowledge_image);  
    //                  $('#action').val("แก้ไข");
    //                  $('#operation').val("Edit");  
    //             }  
    //        })  
    //   }); 

    //   //call function delete when user click delete 
    //   $(document).on('click', '.delete', function() {
    //       //attr id equare id in file knowldge at function fetch_knowledge
    //        var knowledge_id = $(this).attr("id"); 

    //        //display message ofter user click comfirm system will call function to delete data
    //        if(confirm("คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้")) {  
    //             $.ajax({  
    //                  url:"<?php echo base_url(); ?>knowledge/delete_single_knowledge",  
    //                  method:"POST",  
    //                  data:{knowledge_id:knowledge_id},  
    //                  success:function(data) {  
    //                       alert(data);  
    //                       dataTable.ajax.reload();  
    //                  }  
    //             });  
    //        }else {  
    //             return false;       
    //        }  
    //   });  
 });  
 </script> 
