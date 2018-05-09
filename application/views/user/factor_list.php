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
                            
                            <table id="factor_data" class="table table-bordered table-striped">  
                                <thead>  
                                      <tr>  
                                          <th>เพศ</th>  
                                          <th>อายุ</th>  
                                          <th>ข้อมูลสุขภาพตา</th>  
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
      //load knowledge data to table from function fetch_factor
      var dataTable = $('#factor_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'factor/fetch_factor'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                    //Disable or enable sorting on
                     "targets":[2],  
                     "orderable":false,  
                },  
           ],  
      });
 });  
 </script> 
