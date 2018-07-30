<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Renew / Return Book</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
				<form id="defaultForm1" method="POST" class="" action="">
				
				<div class="clearfix"> &nbsp;</div>
 						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Book No</label>
								<div class="">
									<input class="form-control" placeholder="Enter Book No" name="class_id" id="class_id">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Book Title</label>
								<div class="">
									<input class="form-control" placeholder="Enter Book No" name="class_id" id="class_id">
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
								<label class=" control-label">Department</label>
								<div class="">
									<input placeholder="Enter Department" class="form-control" name="class_id" id="class_id">
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
						<div class="col-md-4">
							<div class="form-group">
								<label>Due Date</label>

								<div class="input-group date">
								  <div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								  </div>
								  <input type="text" name="date" class="form-control pull-right" id="datepicker" required>
								</div>
								<!-- /.input group -->
							</div>
                        </div>		
						<div class="col-md-4">
							<div class="form-group">
								<label>Fine,if any</label>

						<div class="">
									<input placeholder="Enter Fine Amount" class="form-control" name="class_id" id="class_id">
								</div>
								<!-- /.input group -->
							</div>
                        </div>	
						
						
						<div class="clearfix"> </div>						
						<div class="col-md-3">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit"  class="btn btn-primary " name="submit" value="check">Return Book</button>
							</div>
							<!-- /.input group -->
						  </div>
                        </div>
					
						<div class="clearfix">&nbsp;</div>
						
						
						
						
					
						<div class="clearfix">&nbsp;</div>
						 
						
                    </form>
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

