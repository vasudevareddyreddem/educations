
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Student Details  
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
		<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            
            
              <!-- /.tab-pane -->
			<div class="modal-body">
					<a href="<?php echo base_url('student/editdetails/'.base64_encode($student_details['u_id'])); ?>" style="float:right;" class="btn btn-primary">Edit</a>					
				<div class="row">
				<div class="col-md-2 col-lg-2 " align="center">
				<?php if($student_details['profile_pic']!=''){?>
				<img src="<?php echo base_url('assets/adminpic/'.$student_details['profile_pic']);?>" class="img-circle img-responsive" alt="<?php echo htmlentities($student_details['profile_pic']); ?>" />
				<?php }else{ ?>
				<img src="<?php echo base_url();?>assets/vendor/201811.svg" class="img-circle img-responsive" alt="User Image" />
				<?php } ?>
				</div>

				<div class=" col-md-6 col-lg-6 "> 

				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Name of the Student</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['name'])?$student_details['name']:''?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Gender</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['gender'])?$student_details['gender']:''?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Date of Birth</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['dob'])?$student_details['dob']:''?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Email</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['email'])?$student_details['email']:'' ?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Blood Group</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['blodd_group'])?$student_details['blodd_group']:'' ?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Address</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['address'])?$student_details['address'].',':''; ?>
						<?php echo isset($student_details['current_city'])?$student_details['current_city'].',':''; ?>
						<?php echo isset($student_details['current_state'])?$student_details['current_state'].',':''; ?>
						<?php echo isset($student_details['current_country'])?$student_details['current_country'].',':''; ?>
						<?php echo isset($student_details['current_pincode'])?$student_details['current_pincode'].'.':''; ?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Class</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['classname'])?$student_details['classname']:''?>&nbsp;<?php echo isset($student_details['section'])?$student_details['section']:''?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Date of Join</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['doj'])?$student_details['doj']:'' ?>
				</div>
				</div> 
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Admission Number</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['roll_number'])?$student_details['roll_number']:''?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Total Fee Amount</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['fee_amount'])?$student_details['fee_amount']:''?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Fee Terms</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['fee_terms'])?$student_details['fee_terms']:'' ?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Paid Amount</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['pay_amount'])?$student_details['pay_amount']:'' ?>
				</div>
				</div>
				
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Name of the Parent :</strong>
				</div>
				<div class="col-md-6 col-xs-3 col-sm-3">
				:&nbsp;&nbsp;<?php echo isset($student_details['parent_name'])?$student_details['parent_name']:'' ?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Gender</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['parent_gender'])?$student_details['parent_gender']:'' ?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Parent Email</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['parent_email'])?$student_details['parent_email']:'' ?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Mobile Number</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['mobile'])?$student_details['mobile']:'' ?>
				</div>
				</div>
              <div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Parent Education</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['education'])?$student_details['education']:'' ?>
				</div>
				</div>
				<div class="row">
				<div class="col-md-6 col-xs-6 col-sm-6">
				<strong>Parent Profession</strong>
				</div>
				<div class="col-md-6 col-xs-6 col-sm-6">
				:&nbsp;&nbsp;<?php echo isset($student_details['profession'])?$student_details['profession']:'' ?>
				</div>
				</div>
				
				
				
				</div>

				</div>
  
            
    
              
              
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
	</section>
 </div>
 </div>

 