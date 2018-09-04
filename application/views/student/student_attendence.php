				<?php //echo'<pre>';print_r($student_list);exit; ?>
<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Attendance</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form onsubmit="return checkvalidation();" id="search_student" method="post" class="" action="<?php echo base_url('student/attendence');?>">
						<div class="col-md-4">
							<div class="form-group">
							<label class=" control-label">Class</label>
										<div class="">
											<select class="form-control" id="class_id" name="class_id" onchange="get_class_sujects(this.value);">
												<option value="">Select Class</option>
												<?php foreach($class_list as $list){ ?>
														<option value="<?php echo $list['class_id']; ?>"><?php echo $list['name'].' '.$list['section']; ?></option>

												<?php } ?>
											</select>
										</div>
									</div>
                        </div>
							
						<div class="col-md-4">
							<div class="form-group">
							<label class=" control-label"> Subject</label>
										<div class="">
											<select class="form-control" id="subjects" name="subjects">
											</select>
										</div>
									</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
							<label class=" control-label"> Time</label>
										<div class="">
											<select class="form-control" id="time" name="time">
											<option value="">Select</option>
											<?php foreach($class_time as $list){ ?>
												<option value="<?php echo $list['form_time'].' '.$list['to_time']; ?>"><?php echo $list['form_time'].' '.$list['to_time']; ?></option>
											<?php } ?>
											</select>
										</div>
							</div>
                        </div>
						
							
						<div class="col-md-12">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit" id="attentdence" class="btn btn-primary pull-right " name="signup" value="Signup">Next</button>
							</div>
							<!-- /.input group -->
						  </div>
                        </div>
					
						<div class="clearfix">&nbsp;</div>
						
                    </form>
					<div class="clearfix">&nbsp;</div>
						<?php if(isset($student_list) && count($student_list)>0){ ?>
					<div class="box attentdence-table" style="">
            <div class="box-header">
              <h3 class="">Enter Attendance</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
		
			<form action="<?php echo base_url('student/attendenceaddpost'); ?>" method="post">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Roll No</th>
				  <th>Name</th>
                  <th>Subject</th>
                  <th>Status</th>
                  <th>Remarks</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php $cnt=0;foreach($student_list as $list){ ?>
				<tr>
					<input type="hidden" name="student_id[]" value="<?php echo isset($list['u_id'])?$list['u_id']:''; ?>">
					<input type="hidden" name="class_id" value="<?php echo isset($list['class_name'])?$list['class_name']:''; ?>">
					<input type="hidden" name="subject_id" value="<?php echo isset($subject_name['id'])?$subject_name['id']:''; ?>">
					<input type="hidden" name="time" value="<?php echo isset($subject_name['time'])?$subject_name['time']:''; ?>">
                  <td><?php echo isset($list['roll_number'])?$list['roll_number']:''; ?> </td>
				  <td><?php echo isset($list['name'])?$list['name']:''; ?></td>
				  <td><?php echo isset($subject_name['subject']) ?$subject_name['subject']:''; ?></td>
				    <td>
					<input type="checkbox" id="attendence" name="attendence[]" value="Present">Present<br>
                    <input type="checkbox" id="attendence" name="attendence[]" value="Absent">Absent<br>
					</td>
                  <td><input type="text"class="form-control" name="remarks[]" placeholder="Remarks"> </td>
				  </tr>
				<?php $cnt++;} ?>
					
                </tbody>
				<?php //echo'<pre>';print_r($student_list);exit; ?>

              </table>
			  <div class="clearfix">&nbsp;</div>
               <button type="submit" class="btn btn-primary col-md-offset-4">Update Attendance</button>
			 
			  </form>
            </div>
            <!-- /.box-body -->
          </div>
		  <?php } ?>
	
          <!-- /.box -->
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
  
  function checkvalidation(){
	 var ids=$('#subjects').val(); 
	 if(ids==''){
		 alert('Please select subject');return false;
	 }
  }
  function get_class_sujects(class_id){
	  	if(class_id!=''){
			jQuery.ajax({

			url: "<?php echo base_url('student/get_teacher_class_subjects');?>",
			type: 'post',
			data: {
			class_id: class_id,
			},
			dataType: 'json',
				success: function (data) {
						$('#subjects').empty();
   						$('#subjects').append("<option value=''>select</option>");
   						for(i=0; i<data.list.length; i++) {
   							$('#subjects').append("<option value="+data.list[i].id+">"+data.list[i].subject+"</option>");                      
                       }
				}
			
			});

	}
	  
  }
  $(document).ready(function() {
 
   $('#search_student').bootstrapValidator({
//       
        fields: {
            class_id: {
                validators: {
					notEmpty: {
						message: 'Class name is required'
					}
				}
            },
			time: {
                validators: {
					notEmpty: {
						message: 'Time is required'
					}
				}
            },
			subjects: {
                validators: {
					notEmpty: {
						message: 'Subject name is required'
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