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
              <form id="defaultForm" name="defaultForm" method="POST" class="" action="<?php echo base_url('transportation/vehicle_details_post');?>">
						
						<div class="row">
							<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Registration Type</label>
									<div class="">
									<select id="registration_type" name="registration_type" class="form-control" >
									<option value="">Select</option>
									<option value="Staff">Staff</option>
									<option value="Student">Student</option>
									
									</select>
									</div>
								</div>
							</div>	
							<div class="col-md-3">
								<div class="form-group">
									<label class=" control-label">Hostel Type</label>
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
							<div class="col-md-3">
								<div class="form-group">
									<label class=" control-label">Room Number</label>
									<div class="">
									<select id="room_numebr" name="room_numebr"  class="form-control" >
										<option value="">Select</option>
										<?php if(isset($room_number_list) && count($room_number_list)>0){ ?>
											<?php foreach($room_number_list as $list){ ?>
												<option value="<?php echo $list['h_r_id']; ?>"><?php echo $list['room_name']; ?></option>
												
											<?php } ?>
										<?php } ?>
									</select>
									</div>
								</div>
							</div>
							</div>
							<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Name</label>
									<div class="">
										<input class="form-control" name="student_name" id="student_name" placeholder="Enter Name">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Gender</label>
									<div class="">
									<select id="gender" name="gender" class="form-control" >
									<option value="">Select</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									
									</select>
									</div>
								</div>
							</div>
							</div>
							<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Contact Number</label>
									<div class="">
										<input class="form-control" name="contact_number" id="contact_number" placeholder="Contact Number">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Date of birth</label>
									<div class="">
										<input class="form-control" name="dob" id="datepicker" placeholder="Enter Date of birth">
									</div>
								</div>
							</div>	
							</div>	
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Joining Date</label>
									<div class="">
										<input class="form-control" name="joining_date" id="datepicker" placeholder="Enter Joining Date">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Till Date</label>
									<div class="">
										<input class="form-control" name="till_date" id="till_date" placeholder="Enter Joining Date">
									</div>
								</div>
							</div>
							</div>
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Allot Bed</label>
									<div class="">
										<input class="form-control" name="allot_bed" id="allot_bed" placeholder="Enter Allot Bed">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Charge per month</label>
									<div class="">
										<input class="form-control" name="charge_per_month" id="charge_per_month" placeholder="Enter Charge per month">
									</div>
								</div>
							</div>
							</div>
							
							<div class="col-md-12">
								<h3>Guardian Details</h3>
							</div>
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Guardian Name</label>
									<div class="">
										<input class="form-control" name="guardian_name" id="guardian_name" placeholder="Enter Guardian Name">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Guardian Contact Number</label>
									<div class="">
										<input class="form-control" name="g_contact_number" id="g_contact_number" placeholder="Enter Guardian Contact Number">
									</div>
								</div>
							</div>
							</div>
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Relation</label>
									<div class="">
										<input class="form-control" name="relation" id="relation" placeholder="Enter Relation">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Email </label>
									<div class="">
										<input type="email" class="form-control" name="email" id="email" placeholder="Email ">
									</div>
								</div>
							</div>
							</div>
							<div class="row">
								<div class="col-md-12">
								<div class="form-group">
									<label class=" control-label">Address</label>
									<div class="">
										<textarea class="form-control" name="address" id="address" placeholder="Enter Address"></textarea>
									</div>
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
 
  <script type="text/javascript">
 $(document).ready(function() {
   
    $('#defaultForm').bootstrapValidator({
//      
        fields: {
			 registration_type:{
			   validators: {
					notEmpty: {
						message: 'Registration Type is required'
					}
				}
            }, 
			hostel_type:{
			   validators: {
					notEmpty: {
						message: 'Hostel Type is required'
					}
				}
            },student_name:{
			   validators: {
					notEmpty: {
						message: 'Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Name can only consist of alphanumeric, space and dot'
					}
				}
            },
			gender:{
			   validators: {
					notEmpty: {
						message:'Gender is required'
					}
				}
            },
			contact_number:{
			   validators: {
					notEmpty: {
						message:'Contact Number is required'
					},
					regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Contact Number must be 10 digits'
					}
				}
            },
			dob: {
                validators: {
					notEmpty: {
						message: 'Date of Birth is required'
					},
					date: {
                        format: 'DD-MM-YYYY',
                        message: 'The value is not a valid date'
                    }
				
				}
            },
			joining_date: {
                validators: {
					notEmpty: {
						message: 'Joining Date is required'
					},
					date: {
                        format: 'DD-MM-YYYY',
                        message: 'The value is not a valid date'
                    }
				
				}
            },
			till_date: {
                validators: {
					notEmpty: {
						message: 'Till Date is required'
					},
					date: {
                        format: 'DD-MM-YYYY',
                        message: 'The value is not a valid date'
                    }
				
				}
            },
			allot_bed: {
                validators: {
					notEmpty: {
						message: 'Allot Bed is required'
					}
				}
            },
			charge_per_month: {
                validators: {
					notEmpty: {
						message: 'Charge per month is required'
					}
				}
            },
			guardian_name: {
                validators: {
					notEmpty: {
						message: 'Guardian Name is required'
					},regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Guardian Name can only consist of alphanumeric, space and dot'
					}
				}
            },
			g_contact_number: {
                validators: {
					notEmpty: {
						message: 'Guardian Contact Number is required'
					},regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Guardian Contact Number must be 10 digits'
					}
				}
            },
			relation: {
                validators: {
					notEmpty: {
						message: 'Relation is required'
					},regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Relation can only consist of alphanumeric, space and dot'
					}
				}
            },
			 email: {
                validators: {
					notEmpty: {
						message: 'Email is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
					message: 'Please enter a valid email address. For example johndoe@domain.com.'
					}
				}
            },
			address:{
			   validators: {
					notEmpty: {
						message: 'Address is required'
					},regexp: {
					regexp:/^[ A-Za-z0-9_@.,/!;:}{@#&`~"\\|^?$*)(_+-]*$/,
					message:'Address wont allow <> [] = % '
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



