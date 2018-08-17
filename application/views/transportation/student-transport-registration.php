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
									<select id="student_id" name="student_id"  class="form-control" >
									<option value="">Select</option>
									</select>
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Route Name</label>
								<div class="">
									<select class="form-control" name="route_name" onchange="get_stop_list(this.value)" style="border-radius:0px;">
										<option value=""> Select</option>
											<?php foreach ($routes_number as $list){ ?>
											<option value="<?php echo $list['r_id']; ?>"><?php echo $list['route_no']; ?></option>
											<?php }?>
									</select>
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Stop Name</label>
								<div class="">
									<select id="multiple_stops" name="multiple_stops" class="form-control" style="border-radius:0px;">
									</select>
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
						<div class="form-group">
								<label class=" control-label">Vehicle Number</label>
								<div class="">
								<select id="vechical_number" name="vechical_number"  class="form-control" >
								<option value="">Select</option>
								<?php foreach ($vechical_number as $list){ ?>
								<option value="<?php echo $list['v_id']; ?>"><?php echo $list['registration_no']; ?></option>
								<?php }?>
								</select>
								</div>
							</div>
                        </div>		
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Pickup Point </label>
								<div class="">
									<input class="form-control" placeholder="Enter Pickup Point" name="pickup_point" id="pickup_point">
								</div>
							</div>
                        </div>		
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Distance</label>
								<div class="">
									<input class="form-control" placeholder="Enter Distance" name="distance" id="distance">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Amount</label>
								<div class="">
									<input class="form-control" placeholder="Enter Amount" name="amount" id="amount">
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
					  <a class="fa fa-pencil btn btn-success" href="<?php echo base_url('transportation/studentedit/'); ?>" >Edit</a>  
					  <a class="fa fa-info-circle btn btn-warning" href="<?php echo base_url('transportation/studentstatus/');?>" >Status</a> 
					  <a class="fa fa-trash btn btn-danger" href="<?php echo base_url('transportation/studentdelete/');?>" >Delete</a> 
					  
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
function get_stop_list(route_number){
	if(route_number !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('transportation/get_vehical_routes_lists');?>",
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
   			url: "<?php echo base_url('transportation/class_student_list');?>",
   			data: {
				class_id: class_id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#student_id').empty();
							$('#student_id').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#student_id').append("<option value="+parsedData.list[i].u_id+">"+parsedData.list[i].name+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}
</script>