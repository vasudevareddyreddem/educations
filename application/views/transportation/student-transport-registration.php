<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Student Transport Registration</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Student Transport Registration</a></li>
              <li><a href="#tab_2" data-toggle="tab">Student Transport Registration  List</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              <form id="defaultForm1" method="POST" class="" action="">
						
						<div class="row">
						
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Class</label>
								<div class="">
									<select class="form-control" style="border-radius:0px;">
										<option>1st Class</option>
										<option>2nd Class</option>
										<option>3rd Class</option>
										<option>4th Class</option>
										
									</select>
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Section</label>
								<div class="">
									<select class="form-control" style="border-radius:0px;">
										<option>A</option>
										<option>B</option>
										<option>C</option>
										<option>D</option>
									</select>
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Select Student</label>
								<div class="">
									<select class="form-control" style="border-radius:0px;">
										<option> Student A</option>
										<option> Student B</option>
										<option> Student C</option>
										<option> Student D</option>
									</select>
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Route Name</label>
								<div class="">
									<select class="form-control" style="border-radius:0px;">
										<option> Route A</option>
										<option> Route B</option>
										<option> Route C</option>
										<option> Route D</option>
									</select>
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Stop Name</label>
								<div class="">
									<select class="form-control" style="border-radius:0px;">
										<option> Stop A</option>
										<option> Stop B</option>
										<option> Stop C</option>
										<option> Stop D</option>
									</select>
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Vehicle Number </label>
								<div class="">
									<input class="form-control" value="TS046382" name="class_id" id="class_id">
								</div>
							</div>
                        </div>		
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Pickup Point </label>
								<div class="">
									<input class="form-control" placeholder="Enter Pickup Point" name="class_id" id="class_id">
								</div>
							</div>
                        </div>		
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Distance</label>
								<div class="">
									<input class="form-control" placeholder="Enter Distance" name="class_id" id="class_id">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Amount</label>
								<div class="">
									<input class="form-control" placeholder="Enter Amount" name="class_id" id="class_id">
								</div>
							</div>
                        </div>		
						
						
                        </div>
					
						
						
						
							
<div class="clearfix"> </div>						
						<div class="col-md-3">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit"  class="btn btn-primary " name="submit" value="check">Register </button>
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
                  <th>S.No</th>
                  <th>Class</th>
                  <th>Section</th>
                  <th>Student</th>
                  <th>Route Name</th>
                  <th>Stop Name</th>
                  <th>Vehicle Number</th>
                  <th>Pickup Point</th>
                  <th>Distance</th>
                  <th>Amount / Anual</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>2nd Class</td>
                  <td>B</td>
                  <td>student one </td>
                  <td>1R</td>
                  <td>sr nagar</td>
                  <td>TS046382</td>
                  <td>Near DMart</td>
                  <td>11 KM</td>
                  <td>₹ 15000 </td>
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
  <script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
  </script>
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

	