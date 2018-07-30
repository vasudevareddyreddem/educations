<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Book</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Add  New Book
</a></li>
              <li><a href="#tab_2" data-toggle="tab">Book Details </a></li>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <form id="defaultForm1" method="POST" class="" action="">
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Book Number</label>
								<div class="">
									<input class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Book Title</label>
								<div class="">
									<input class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Author Name</label>
								<div class="">
									<input class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Publisher</label>
								<div class="">
									<input class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Category</label>
								<div class="">
									<input class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">ISBN</label>
								<div class="">
									<input class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>	
						
							
						<div class="col-md-4">
							<div class="form-group">
								<label> Date arrived</label>

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
								<label class=" control-label">Price</label>
								<div class="">
									<input class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Quantity</label>
								<div class="">
									<input class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Shelf No</label>
								<div class="">
									<input class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Department</label>
								<div class="">
									<input class="form-control" name="class_id" id="class_id">
								</div>
							</div>
                        </div>		
<div class="clearfix"> </div>						
						<div class="col-md-3">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit"  class="btn btn-primary " name="submit" value="check">Add Book</button>
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
                  <th>Book No</th>
                  <th>ISBN</th>
                  <th>Book Title</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Date Arrived</th>
                  <th>Price</th>
                  <th>Available Quantity</th>
                  <th>Shelf No</th>
                  <th>Department</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>201</td>
                  <td>850022</td>
                  <td>Social</td>
                  <td>author 1</td>
                  <td>Vikram</td>
                  <td>10-07-2018</td>
                  <td>₹ 530</td>
                  <td>100</td>
                  <td>4A </td>
                  <td>Envinorment </td>
                  <td>
					  <a class="btn btn-warning btn-sm" href="" >Edit</a> 
					  
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

