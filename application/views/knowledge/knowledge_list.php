<script src='<?=base_url()?>assets/tinymce/tinymce.min.js'></script>
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
                            
                            <table id="knowledge_data" class="table table-bordered table-striped">  
                                <thead>  
                                      <tr>  
                                          <th>ภาพ</th>  
                                          <th>ประเภท</th>  
                                          <th>เรื่อง</th>  
                                          <th>เนื้อความ</th>
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

<!-- /knowledge modal -->
 <div id="knowledgeModal" class="modal fade">  
      <div class="modal-dialog">  
           <form method="post" id="knowledge_form">  
                <div class="modal-content">  
                     <div class="modal-header">  
                          <button type="button" class="close" data-dismiss="modal">&times;</button>  
                          <h4 class="modal-title">เพิ่มข้อมูลเกล็ดความรู้</h4>  
                     </div>  
                     <div class="modal-body">  
                          <!-- <label>ประเภท</label>  
                          <input type="text" name="type" id="type" class="form-control" />   -->
                          <div class="form-group">
                            <label for="typ">กรุณาเลือกประเภท<font color="red"> *</font></label>
                            <select type="text" name="type" id="type" class="form-control">
                              <option>ความรู้เกี่ยวกับโรคสายตา</option>
                              <option>ความรู้เกี่ยวกับการรับประทานอาหาร</option>
                              <option>ความรู้เกี่ยวกับสายตา</option>
                              <option>ความรู้เกี่ยวกับแสง</option>
                              <option>ความรู้เกี่ยวกับผลกระทบด้านอื่นๆ</option>
                            </select>
                          </div>
                          <br />  
                          <label>เรื่อง<font color="red"> *</font></label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="กำหนดชื่อหัวเรื่องที่ต้องการ" />  
                          <br />
                          <label>เนื้อความ<font color="red"> *</font></label>
                          <textarea type="text" name="detail" id="detail" class="form-control" placeholder="กำหนดเนื้อหาที่ต้องการ" row="5" ></textarea>  
                            <!-- <textarea name="detail" id="detail">                                                 
                                <?php $query = mysqli_query($con, "SELECT * FROME knowledge WHERE id ='$knowledge_id'");
                                    $row = mysqli_fetch_array($query);
                                ?>
                                <?= $row['detail'];?>
                            </textarea> -->
                          <br />
                          <label>กรุณาเลือกรูปภาพ<font color="red"> *</font></label>  
                          <input type="file" name="knowledge_image" id="knowledge_image" />  
                          <span id="knowledge_uploaded_image"></span>  
                     </div>  
                     <div class="modal-footer">  
                          <input type="hidden" name="knowledge_id" id="knowledge_id" />
                          <input type="hidden" name="operation" id="operation" />  
                          <input type="submit" name="action" id="action" class="btn btn-success" value="เพิ่ม" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>  
                     </div>  
                </div>  
           </form>  
      </div>  
 </div>

<!-- /button add -->
<div class="col-lg-12" style="position:fixed;bottom: 5%;left: 88%; width: 150px;text-align: center;border-radius: 100%;">
    <img id="add_button" class="add_user" src="<?=base_url()?>assets/images/add.png" data-toggle="modal" data-target="#knowledgeModal" />
</div>


<!-- /#page-wrapper -->
<?php $this->load->view('frame/footer_view') ?>
<script type="text/javascript" language="javascript" >  
 $(document).ready(function() {

    tinymce.init({
    selector: '#detail',
    height: 500,
    theme: 'modern',
    plugins: [
      'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      'searchreplace wordcount visualblocks visualchars code fullscreen',
      'insertdatetime media nonbreaking save table contextmenu directionality',
      'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'print preview media | forecolor backcolor emoticons',
    image_advtab: true
});
 
   //when click button add system reset form to empty and custom operation to Add 
      $('#add_button').click(function() {  
           $('#knowledge_form')[0].reset();  
           $('.modal-title').text("เพิ่มข้อมูลเกล็ดความรู้");  
           $('#action').val("เพิ่ม");
           $('#operation').val("Add");  
           $('#knowledge_uploaded_image').html('');  
      })

      //load knowledge data to table from function fetch_knowledge
      var dataTable = $('#knowledge_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'knowledge/fetch_knowledge'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });
      
        
      $(document).on('submit', '#knowledge_form', function(event){  
           event.preventDefault();  
           var type = $('#type').val();  
           var name = $('#name').val();
           var detail = $('#detail').val();  
           var extension = $('#knowledge_image').val().split('.').pop().toLowerCase();

           if(extension != '') {  
                //check type of pictures
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1) {  
                     alert("ไฟล์รูปภาพไม่ถูกต้อง");  
                     $('#knowledge_image').val('');  
                     return false;  
                }  
           }

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
           var knowledge_id = $(this).attr("id");  
           $.ajax({  
                url:"<?php echo base_url(); ?>knowledge/fetch_single_knowledge",  
                method:"POST",  
                data:{knowledge_id:knowledge_id},  
                dataType:"json",  
                success:function(data) {  
                     $('#knowledgeModal').modal('show');  
                     $('#type').val(data.type);  
                     $('#name').val(data.name);
                     $('#detail').html(data.detail); 
                     $('.modal-title').text("แก้ไขข้อมูลเกล็ดความรู้");  
                     $('#knowledge_id').val(knowledge_id);  
                     $('#knowledge_uploaded_image').html(data.knowledge_image);  
                     $('#action').val("แก้ไข");
                     $('#operation').val("Edit");  
                }  
           })  
      }); 

      //call function delete when user click delete 
      $(document).on('click', '.delete', function() {
          //attr id equare id in file knowldge at function fetch_knowledge
           var knowledge_id = $(this).attr("id"); 

           //display message ofter user click comfirm system will call function to delete data
           if(confirm("คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้")) {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>knowledge/delete_single_knowledge",  
                     method:"POST",  
                     data:{knowledge_id:knowledge_id},  
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
