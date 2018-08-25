<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Allocate Room </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			
			 <li class="<?php if(isset($tab) && $tab==0){  echo "active";} ?>"><a href="#tab_1" data-toggle="tab">Room Allotment</a></li>
               <li class="<?php if(isset($tab) && $tab==1){  echo "active";} ?>"><a href="#tab_2" data-toggle="tab">Allotted List </a></li>
			 
            </ul>
            <div class="tab-content">
             <div class="tab-pane <?php if(isset($tab) && $tab==''){  echo "active";} ?>" id="tab_1">
              <form id="defaultForm1" method="POST" class="" action="<?php echo base_url('transportation/vehicle_details_post');?>">
						
						<div class="row">
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Registration Type</label>
									<div class="">
									<select id="route_number"    class="form-control" >
									<option value="">Select</option>
									<option value="">Staff</option>
									<option value="">Student</option>
									
									</select>
									</div>
								</div>
							</div>	
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Hostel Type</label>
									<div class="">
									<select id="route_number"    class="form-control" >
									<option value="">Select</option>
									<option value="">lux</option>
									<option value="">del</option>
									
									</select>
									</div>
								</div>
							</div>
							
						
					
						<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Name</label>
									<div class="">
										<input class="form-control" placeholder="Enter Name">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Gender</label>
									<div class="">
									<select id="route_number"    class="form-control" >
									<option value="">Select</option>
									<option value="">Male</option>
									<option value="">Female</option>
									
									</select>
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Contact Number</label>
									<div class="">
										<input class="form-control" placeholder="Contact Number">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Date of birth</label>
									<div class="">
										<input class="form-control" placeholder="Enter Date of birth">
									</div>
								</div>
							</div>	
						
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Joining Date</label>
									<div class="">
										<input class="form-control" placeholder="Enter Joining Date">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Till Date</label>
									<div class="">
										<input class="form-control" placeholder="Enter Joining Date">
									</div>
								</div>
							</div>
				
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Allot Bed</label>
									<div class="">
										<input class="form-control" placeholder="Enter Allot Bed">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Charge per month</label>
									<div class="">
										<input class="form-control" placeholder="Enter Charge per month">
									</div>
								</div>
							</div>
					
							<div class="col-md-12">
								<h3>Guardian Details</h3>
							</div>
					
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Guardian Name</label>
									<div class="">
										<input class="form-control" placeholder="Enter Guardian Name">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Guardian Contact Number</label>
									<div class="">
										<input class="form-control" placeholder="Enter Guardian Contact Number">
									</div>
								</div>
							</div>
					
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Relation</label>
									<div class="">
										<input class="form-control" placeholder="Enter Relation">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Email </label>
									<div class="">
										<input type="email" class="form-control" placeholder="Email ">
									</div>
								</div>
							</div>
						
								<div class="col-md-12">
								<div class="form-group">
									<label class=" control-label">Address</label>
									<div class="">
										<textarea class="form-control" placeholder="Enter Address"></textarea>
									</div>
								</div>
							</div>
						</div>
					
						
					
						<div class="clearfix"> </div>						
						<div class="col-md-12">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group pull-right">
							  <button type="submit"  class="btn btn-primary " name="submit" value="check">Add</button> &nbsp;
							  <button type="submit"  class="btn btn-warning " name="submit" value="check">Cancel</button>
							</div>
							<!-- /.input group -->
						  </div>
                        </div>
					
						<div class="clearfix">&nbsp;</div>
						
						
						
						
					
						<div class="clearfix">&nbsp;</div>
						 
						
                    </form>
              </div>
              <!-- /.tab-pane -->
             <div class="tab-pane  <?php if(isset($tab) && $tab==1){  echo "active";} ?>" id="tab_2">
				 <div class="clearfix"></div>
        
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
				
                <tr>
                  <th>S. No</th>
                  <th>Name</th>
                  <th>Contact Number</th>
                  <th>Gender</th>
                  <th>Room No</th>
                  <th>Bed No</th>
                  <th>Charge</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				
                <tr>
                  <td>1</td>
                  <td>Bayapu</td>
                  <td>8500226782</td>
                  <td>Male</td>
                  <td>2</td>
                  <td>5</td>
                  <td>1000</td>
                 
                  <td>
					  <button type="submit"  class="btn btn-primary btn-xs" name="submit" value="check">Edit</button> &nbsp;
					  <button type="submit"  class="btn btn-warning btn-xs" name="submit" value="check">Delete</button>
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
			 route_number:{
			   validators: {
					notEmpty: {
						message: 'Route Number is required'
					}
				}
            },
			multiple_stops:{
			   validators: {
					notEmpty: {
						message: 'Multiple stops is required'
					}
				}
            },
			registration_no:{
			   validators: {
					notEmpty: {
						message: 'Registration No is required'
					}
				}
            },
			driver_name:{
			   validators: {
					notEmpty: {
						message: 'Driver Name is required'
					}
				}
            },
			
			driver_no:{
			   validators: {
					notEmpty: {
						message: 'Driver Mobile Number is required'
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
function get_stop_list(route_number){
	if(route_number !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('transportation/routes_sides');?>",
   			data: {
				route_number: route_number,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#multiple_stops').empty();
							$('#multiple_stops').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#multiple_stops').append("<option value="+parsedData.list[i].stop_id+">"+parsedData.list[i].stop_name+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}
</script>

