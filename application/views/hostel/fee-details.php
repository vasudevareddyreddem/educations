<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Fee Details </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
			
			 <li class="<?php if(isset($tab) && $tab==0){  echo "active";} ?>"><a href="#tab_1" data-toggle="tab">Fee Details</a></li>
               <li class="<?php if(isset($tab) && $tab==1){  echo "active";} ?>"><a href="#tab_2" data-toggle="tab">Fee Details List </a></li>
			 
            </ul>
            <div class="tab-content">
             <div class="tab-pane <?php if(isset($tab) && $tab==''){  echo "active";} ?>" id="tab_1">
              <form id="defaultForm" method="POST" class="" action="">
						
				
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Student Name</label>
									<div class="">
										<input class="form-control" name="student_name" id="student_name" placeholder="Enter Student Name">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Father Name</label>
									<div class="">
										<input class="form-control"  name="father_name" id="father_name" placeholder="Enter Father Name">
									</div>
								</div>
							</div>
							
					
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
									<label class=" control-label">Fee Occurrence</label>
									<div class="">
										<input class="form-control" id="fee_occurrence" name="fee_occurrence" placeholder="Enter Date of birth">
									</div>
								</div>
							</div>	
						
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Total Amount</label>
									<div class="">
										<input class="form-control" name="total_amount" id="total_amount" placeholder="Enter Total Amount">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Amount Paid</label>
									<div class="">
										<input class="form-control" name="amount_paid" id="amount_paid" placeholder="Enter Amount Paid">
									</div>
								</div>
							</div>
						
								<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Due Amount</label>
									<div class="">
										<input class="form-control" name="due_amount" id="due_amount" placeholder="Enter Due Amount">
									</div>
								</div>
							</div>
						
							<div class="col-md-6">
								<div class="form-group">
									<label class=" control-label">Payment Mode</label>
									<div class="">
										<input class="form-control" name="payment_mode" id="payment_mode" placeholder="Enter Payment Mode">
									</div>
								</div>
							</div>
						</div>		
						
						
						
					
						<div class="clearfix"> </div>						
						<div class="col-md-12">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group pull-right">
							  <button type="submit"  class="btn btn-primary " name="submit" value="check">Pay</button> &nbsp;
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
                  <th>Name of the Student</th>
                  <th>Father Name</th>
                  <th>Contact Number</th>
                  <th>Fee Occurrence</th>
                  <th>Total Amount</th>
                  <th>Amount Paid</th>
                  <th>Due Amount</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				
                <tr>
                  <td>1</td>
                  <td>Bayapu</td>
                  <td>siva ramireddy</td>
                  <td>8500226782</td>
                  <td>yes</td>
                  <td>2000</td>
                  <td>1000</td>
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
  
  
 
  </script>
  <script type="text/javascript">
  
$(document).ready(function() {
    $('#defaultForm').bootstrapValidator({
        
        fields: {
            
            student_name: {
                 validators: {
					notEmpty: {
						message: 'Student Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Student Name can only consist of alphanumeric, space and dot'
					}
					
				}
            },
			father_name: {
                 validators: {
					notEmpty: {
						message: 'Father Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Father Name can only consist of alphanumeric, space and dot'
					}
					
				}
            },
			
			contact_number: {
                 validators: {
					notEmpty: {
						message: 'Contact Number is required'
					},
					regexp: {
					regexp:  /^[0-9]{10}$/,
					message:'Contact Number must be 10 digits'
					}
				
				}
            },
			fee_occurrence: {
                 validators: {
					notEmpty: {
						message: 'Fee Occurrence is required'
					},
					
				}
            },
			total_amount: {
                 validators: {
					notEmpty: {
						message: 'Total Amount is required'
					},
					regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Total Amount must be digits'
   					}
					
				}
            },
			amount_paid: {
                 validators: {
					notEmpty: {
						message: 'Amount Paid is required'
					},
					regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Amount Paid must be digits'
   					}
					
				}
            },
			due_amount: {
                 validators: {
					notEmpty: {
						message: 'Due Amount is required'
					},
					regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Due Amount must be digits'
   					}
					
				}
            },
			payment_mode: {
                 validators: {
					notEmpty: {
						message: 'Payment Mode is required'
					},
					
				}
            }
			
            }
        })
     
});
</script>
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
