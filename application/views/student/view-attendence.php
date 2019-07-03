<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">View Attendance</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="defaultForm" method="post" class="" action="<?php echo base_url('student/viewattendence'); ?>">
			<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Class list</label>
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
								<label class=" control-label">Student Name</label>
								<div class="">
									<select class="form-control" id="subjects" name="subjects" >
									<option value="">Select Subject</option>
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
				<button type="submit" class="btn btn-primary pull-right " name="signup" value="submit">Next</button>
							</div>
							<!-- /.input group -->
						  </div>
                        </div>
					
						<div class="clearfix">&nbsp;</div>
						
						
						
						
					
						<div class="clearfix">&nbsp;</div>
						 
						
                    </form>
					<div class="clearfix">&nbsp;</div>
					
			<?php if(isset($student_view_attendenace) && count($student_view_attendenace)>0){ ?>	
				<div class="box attentdence-table" style="">
					<div class="box-header">
					  <h3 class="">View Attendance</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
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
                <?php foreach($student_view_attendenace as $list){ ?>
				<tr>
					
                  <td><?php echo isset($list['roll_number'])?$list['roll_number']:''; ?> </td>
				  <td><?php echo isset($list['username'])?$list['username']:''; ?></td>
				  <td><?php echo isset($list['subject_id']) ?$list['subject_id']:''; ?></td>
				    <td>
					<input type="checkbox"   name="attendence" value="Present" <?php echo ($list['attendence']=='Present' ? 'checked' : '');?>>Present<br>
                    <input type="checkbox"   name="attendence" value="Absent" <?php echo ($list['attendence']=='Absent' ? 'checked' : '');?>>Absent<br>
					
					</td>
                  <td>
				  <input type="text"class="form-control" name="remarks" placeholder="Remarks" value="<?php echo isset($list['remarks'])?$list['remarks']:''?>"> 
				  
				  </td>
				  
				  </tr>
				
				<?php } ?>
					
                </tbody>
					  </table>
					  <div class="clearfix">&nbsp;</div>
					 
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
  $(document).ready(function(){
    $("#attentdence").click(function(){
        $(".attentdence-table").toggle();
    });
});
  
  </script>
  <script type="text/javascript">
$(document).ready(function() {
   $('#defaultForm').bootstrapValidator({
//     
        fields: {
			student_id:{
			 validators: {
                    notEmpty: {
                        message: 'Student Name is required'
                    }
                }
            },
			
            exam_type: {
                validators: {
                    notEmpty: {
                        message: 'Exam Type is required'
                    }
                }
            },
			class_id: {
                validators: {
                    notEmpty: {
                        message: 'Class is required'
                    }
                }
            },
			subjects: {
                validators: {
                    notEmpty: {
                        message: 'Subject is required'
                    }
                }
            },
			time: {
                validators: {
                    notEmpty: {
                        message: 'Time is required'
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
   							$('#subjects').append("<option value="+data.list[i].subject+">"+data.list[i].subject+"</option>");                      
                       }
				}
			
			});

	}
	  
  }
  
</script>