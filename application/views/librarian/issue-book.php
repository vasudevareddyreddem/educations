<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Issue Book</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Issue Book</a></li>
              <li><a href="#tab_2" data-toggle="tab">Issued Books List</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <form id="defaultForm1" method="POST" class="" action="">
				<div class="col-md-12">
				<img style="width:250px;height:auto;margin:0 auto;" class="img-responsive thumbnail" src="https://forum.affinity.serif.com/uploads/monthly_2018_05/5b0029dccf77a_00860303002305UPC-ASST1.png.db7004fead686bd2bf77ed6257d25b53.png" alt="barcode">
				</div>
				<div class="clearfix"> &nbsp;</div>
 						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Scan</label>
								<div class="">
									<input class="form-control" placeholder="Enter Barcode No Manually" name="class_id" id="class_id">
								</div>
							</div>
                        </div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Class list</label>
								<div class="">
								<select id="class_id" name="class_id" onchange="get_student_list(this.value);" class="form-control" >
								<option value="">Select</option>
								<?php foreach ($class_list as $list){ ?>
								<option value="<?php echo $list['id']; ?>"><?php echo $list['name'].' '.$list['section']; ?></option>
								<?php }?>
								</select>
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Student Name</label>
								<div class="">
									<input placeholder="Enter Student Name" class="form-control" >
								</div>
							</div>
                        </div>
						
						
							<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Book No</label>
								<div class="">
									<input placeholder="Enter Book Name" class="form-control" >
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Book Name</label>
								<div class="">
									<input placeholder="Enter Book Name" class="form-control" >
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">No. of Books Taken</label>
								<div class="">
									<input placeholder="No. of Books Taken" class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>
					
					
						
						
							
						<div class="col-md-4">
							<div class="form-group">
								<label>Date of Issue</label>

								<div class="input-group date">
								  <div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								  </div>
								  <input type="text" name="date" class="form-control pull-right" id="datepicker" required>
								</div>
								<!-- /.input group -->
							</div>
                        </div>	
						
						
						<div class="clearfix"> </div>						
						<div class="col-md-3">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit"  class="btn btn-primary " name="submit" value="check">Issue Book</button>
							</div>
							<!-- /.input group -->
						  </div>
                        </div>
					
						<div class="clearfix">&nbsp;</div>
						
						
						
						
					
						<div class="clearfix">&nbsp;</div>
						 
						
                    </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
				 <div class="clearfix"></div>
        
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Student Name</th>
                  <th>Student Roll No</th>
				  <th>Department</th>
                  <th>Book No</th>
                  <th>Book Title</th>
                  <th>No of Books Taken</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Date Arrived</th>
                  <th>Date of Return</th>
                  <th>Status</th>
                 
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Student 1</td>
                  <td>850022</td>
                  <td>Envinorment</td>
                  <td>2211</td>
                  <td>Socail</td>
                  <td>2</td>
                  <td>author 1</td>
                  <td>vikarm</td>
                  <td>20-07-2018</td>
                  <td>pursing </td>
                  
                  <td>
					  <a class="btn btn-warning btn-sm" href="" >Pending</a> 
					
				  </td>
                </tr>
				</tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
              </div>
              <!-- /.tab-pane -->
           
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
       
          <!-- /.box -->
		   <div class="clearfix"></div>
          </div>
		 
          </div>
          <!-- /.box -->

         

        </div>
      
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
	  
    </section> 
   
</div>
  
  <script type="text/javascript">
  
$(document).ready(function() {
   
    $('#defaultForm').bootstrapValidator({
//      
        fields: {
            firstName: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    });

    // Validate the form manually
    $('#validateBtn').click(function() {
        $('#defaultForm').bootstrapValidator('validate');
    });

    $('#resetBtn').click(function() {
        $('#defaultForm').data('bootstrapValidator').resetForm(true);
    });
});
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script>
function get_student_list(class_id){
	if(class_id !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('librarian/get_student_list_class_wise');?>",
   			data: {
				class_id: class_id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
					
   					}
           });
	   }
}
</script>

