       <?php //echo'<pre>';print_r($student_transport);exit; ?>

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
			 <li class="<?php if(isset($tab) && $tab==''){ echo "active"; } ?>"><a href="#tab_1" data-toggle="tab">Student Transport Registration</a></li>
              <li class="<?php if(isset($tab) && $tab==1){ echo "active"; } ?>"><a href="#tab_2" data-toggle="tab">Student Transport Registration  List</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane  <?php if(isset($tab) && $tab==''){ echo "active"; } ?>" id="tab_1">
              <form id="defaultForm" method="POST" class="" action="<?php echo base_url('transportation/student_transport_registration_post');?>">
					
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
							<select id="route" name="route" onchange="get_route_stops_student(this.value);" class="form-control" >
							<option value="">Select</option>
							<?php foreach ($routes as $list){ ?>
								<option value="<?php echo $list['route_id']; ?>"><?php echo $list['route_no']; ?></option>
								<?php }?>
							</select>
							</div>
                        </div>	
						
						<div class="col-md-4">
							<div class="form-group">
							<label class=" control-label">Stop From</label>
							<select id="stop_strat" name="stop_strat" onchange="get_route_stops_end_student(this.value);" class="form-control" >
							<option value="">Select</option>
							<?php foreach ($stops_student as $list){ ?>
			              <option value="<?php echo $list['f_id']; ?>"><?php echo $list['stop_name']; ?></option>
			                 <?php }?>
							</select>
							</div>
                        </div>	
						
						<div class="col-md-4">
							<div class="form-group">
							<label class=" control-label">To Stop</label>
							<select id="stop_end" name="stop_end" onchange="get_stops_route_amount(this.value);" class="form-control" >
							<option value="">Select</option>
							
							</select>
							</div>
                        </div>	
						
						
						
						<!--<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Route Name</label>
								<div class="">
									<select class="form-control" name="route" onchange="get_stop_list(this.value)" style="border-radius:0px;">
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
									<select id="stop" name="stop" onchange="get_vehical_list(this.value);" class="form-control" style="border-radius:0px;">
									<option value=""> Select</option>
									</select>
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
						<div class="form-group">
								<label class=" control-label">Vehicle Number</label>
								<div class="">
								<select id="vechical_number" name="vechical_number" onchange="get_vechical_stop_list(this.value)"  class="form-control" >
								<option value="">Select</option>
							
								</select>
								</div>
							</div>
                        </div>		
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Pickup Point</label>
								<div class="">
									<select id="pickup_point" name="pickup_point" class="form-control" style="border-radius:0px;">
									</select>
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
                        </div>-->
						<div class="col-md-4">
								<div class="form-group">
								<label class=" control-label">Amount</label>
								<div class="">
									<select id="total_amount" name="total_amount"  class="form-control" >
									<option value="">Select</option>
									</select>
								</div>
								
							</div>
                        </div>		
						
						
                        </div>
					
						
					
						
							
<div class="clearfix"> </div>						
						<div class="col-md-3">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit"  class="btn btn-primary " name="validateBtn" id="validateBtn"  value="check">Register </button>
							</div>
							<!-- /.input group -->
						  </div>
                        </div>
					
						<div class="clearfix">&nbsp;</div>
						
						
						
						
					
						<div class="clearfix">&nbsp;</div>
						 
						
                    </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php if(isset($tab) && $tab==1){ echo "active"; } ?>" id="tab_2">
				 <div class="clearfix"></div>
        
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.NO</th>
                  <th>Class</th>
                  <th>Student</th>
                  <th>Route Name</th>
                  <th>Stop Form</th>
                  <th>Stop to</th>
                  <th>Amount / Anual</th>
				  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php $cnt=1; foreach($student_transport as $list){?>
                <tr>
				  <td><?php echo $cnt; ?></td> 
                  <td><?php echo $list['name']; ?><?php echo $list['section']; ?></td>
                  <td><?php echo $list['username']; ?></td>
                  <td><?php echo $list['route_no']; ?></td>
                  <td><?php echo $list['stop_name']; ?></td>
                  <td><?php echo $list['stop_end']; ?></td>
                  <td><?php echo $list['total_amount']; ?></td>
                  <td><?php if($list['status']==1){ echo "active";}else{ echo "Deactive"; } ?></td>
				  <td>
				<a href="<?php echo base_url('transportation/studentedit/'.base64_encode($list['s_t_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
				<a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['s_t_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="fa fa-info-circle btn btn-warning"></i></a>
				<a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['s_t_id']) ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
				</td> 
				  
                </tr>
				<?php $cnt++;} ?>
				
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
function get_route_stops_student(route){
	if(route !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('transportation/get_route_stops_student');?>",
   			data: {
				route: route,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#stop_strat').empty();
							$('#stop_strat').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#stop_strat').append("<option value="+parsedData.list[i].stops+">"+parsedData.list[i].stop_name+"</option>");  
                           
								
							 
							}
						}
						
   					}
           });
	   }
}

</script>
<script>
function get_route_stops_end_student(stop_strat){
	if(stop_strat !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('transportation/get_route_stops_end_student');?>",
   			data: {
				stop_strat: stop_strat,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#stop_end').empty();
							$('#stop_end').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#stop_end').append("<option value="+parsedData.list[i].to_stops+">"+parsedData.list[i].to_stops+"</option>");  
                           
								
							 
							}
						}
						
   					}
           });
	   }
}

</script>
<script>
function get_stops_route_amount(stop_end){
	if(stop_end !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('transportation/get_stops_route_amount');?>",
   			data: {
				stop_end: stop_end,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#total_amount').empty();
							$('#total_amount').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#total_amount').append("<option value="+parsedData.list[i].amount+">"+parsedData.list[i].amount+"</option>");  
                           
								
							 
							}
						}
						
   					}
           });
	   }
}

</script>
<script type="text/javascript">
  function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('transportation/studentstatus/'); ?>"+"/"+id);
} 

function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('transportation/studentdelete/'); ?>"+"/"+id);
}
function adminstatus(id){
	if(id==1){
			$('#content1').html('Are you sure you want to Deactivate?');
		
	}if(id==0){
			$('#content1').html('Are you sure you want to activate?');
	}
}
 
$(document).ready(function() {
   
    $('#defaultForm').bootstrapValidator({
//      
        fields: {
			 class_id:{
			   validators: {
					notEmpty: {
						message: 'Class list is required'
					}
				}
            }, 
			student_id:{
			   validators: {
					notEmpty: {
						message: 'Student Name is required'
					}
				}
            },
			route:{
			   validators: {
					notEmpty: {
						message: 'Route Name is required'
					}
				}
            },
			stop_strat:{
			   validators: {
					notEmpty: {
						message: 'Stop form is required'
					}
				}
            },
			stop_end:{
			   validators: {
					notEmpty: {
						message: 'Stop to is required'
					}
				}
            },
			
			
			total_amount: {
                validators: {
					notEmpty: {
						message: 'Amount is required'
					},regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Amount must be digits'
   					}
				}
            }
			
			
			
			
        }
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