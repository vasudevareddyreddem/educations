<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Book Damage/Book Lost</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Book Damage / Book Lost</a></li>
              <li><a href="#tab_2" data-toggle="tab">Book Damage / Book Lost List</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <form id="defaultForm1" method="POST" class="" action="">
			
				<div class="clearfix"> &nbsp;</div>
 						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Enter Book Title</label>
								<div class="">
									<input class="form-control" placeholder=" Enter Book Title" >
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Student No</label>
								<div class="">
									<input placeholder="Enter Student No" class="form-control" >
								</div>
							</div>
                        </div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Author Name</label>
								<div class="">
									<input placeholder="Enter Author Name" class="form-control" >
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
								<label class=" control-label">Category</label>
								<div class="">
									<input placeholder="Enter Category1" class="form-control" >
								</div>
							</div>
                        </div>
								<div class="col-md-4">
							<div class="form-group">
							<label class=" control-label">Return</label>
										<div class="">
											<select class="form-control" name="class_id" id="class_id"> 
												<option value="">Select type</option>
											
													<option value="">Amount </option>
													<option value="">Replace Book </option>
										
												
											</select>
										</div>
									</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Price</label>
								<div class="">
									<input placeholder="Enter Book Amount" class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>
					
					
						
						
						<div class="clearfix"> </div>						
						<div class="col-md-3">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit"  class="btn btn-primary " name="submit" value="check">Submit Book</button>
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
                  <th>Enter Book Title</th>
                  <th>Student No</th>
				  <th>Author Name</th>
                  <th>Student Name</th>
                  <th>Category</th>
                  <th>Return Type</th>
                  <th>Price</th>
                  <th>Submit Date</th>
               
                 
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>test 1</td>
                  <td>850022</td>
                  <td> Author 1</td>
                  <td>test student 1</td>
                  <td>Text Book</td>
                  <td>Replacement </td>
                  <td>₹ 20</td>
                  <td>20-07-2018</td>
                 
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

