<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Room Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			
			 <li class="<?php if(isset($tab) && $tab==0){  echo "active";} ?>"><a href="#tab_1" data-toggle="tab">Add New Room</a></li>
               <li class="<?php if(isset($tab) && $tab==1){  echo "active";} ?>"><a href="#tab_2" data-toggle="tab">Room Details List</a></li>
			 
            </ul>
            <div class="tab-content">
             <div class="tab-pane <?php if(isset($tab) && $tab==''){  echo "active";} ?>" id="tab_1">
              <form id="defaultForm" method="POST" class="" action="<?php echo base_url('hostelmanagement/addroomdetails'); ?>">
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								<label class=" control-label">Hostel Name</label>
								<div class="">
								<select id="hostel_type" name="hostel_type"  class="form-control" >
								<option value="">Select</option>
								<?php if(isset($hostel_list) && count($hostel_list)>0){ ?>
									<?php foreach($hostel_list as $list){ ?>
										<option value="<?php echo $list['id']; ?>"><?php echo $list['hostel_name']; ?></option>
										
									<?php } ?>
								<?php } ?>
								</select>
								</div>
							</div>
							
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Room Name</label>
									<div class="">
										<input class="form-control" name="room_name" id="room_name" placeholder="Enter Room Name">
									</div>
								</div>
							</div>	
					
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Floor Number</label>
									<div class="">
										<select id="floor_number" name="floor_number"  class="form-control" >
										<option value="">Select</option>
										<?php if(isset($hostel_floors_list) && count($hostel_floors_list)>0){ ?>
											<?php foreach($hostel_floors_list as $list){ ?>
												<option value="<?php echo $list['f_id']; ?>"><?php echo $list['floor_name']; ?></option>
											
											<?php } ?>
										<?php } ?>
										</select>
									</div>
								</div>
							</div>	
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Total Beds</label>
									<div class="">
										<input class="form-control" name="total_beds" id="total_beds" placeholder="Enter Total Beds">
									</div>
								</div>
							</div>	
						</div>
						<div class="clearfix"> </div>						
						<div class="col-md-12">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group pull-right">
							  <button type="submit"  class="btn btn-primary " id="validateBtn" name="validateBtn" value="check">Add</button> &nbsp;
							  <a href="<?php echo base_url('dashboard'); ?>" type="button"  class="btn btn-warning " name="submit" value="check">Cancel</a>
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
                  <th>Room Type</th>
                  <th>Room Name</th>
                  <th>Room Number</th>
                  <th>Floor</th>
                  <th>Total Beds</th>
                  <th>Cost</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				
                <tr>
                  <td>1</td>
                  <td>lux</td>
                  <td>name2</td>
                  <td>5</td>
                  <td>4</td>
                  <td>6</td>
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
 
  <script type="text/javascript">
  
$(document).ready(function() {
   
    $('#defaultForm').bootstrapValidator({
//      
        fields: {
			 hostel_type:{
			   validators: {
					notEmpty: {
						message: 'Hostel Name is required'
					}
				}
            }, 
			floor_number:{
			   validators: {
					notEmpty: {
						message: 'Floor Number is required'
					}
				}
            },
			room_name:{
			   validators: {
					notEmpty: {
						message: 'Room Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Room Name can only consist of alphanumeric, space and dot'
					}
				}
            },
			
			total_beds:{
			   validators: {
					notEmpty: {
						message: 'Total Beds is required'
					},regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Total Beds can only consist of alphanumeric, space and dot'
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



