<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Exam</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			<div class="row">
            <form id="addexam_form" method="post" class="" action="<?php echo base_url('examination/createpost'); ?>">
				<div class="col-md-6">
							<div class="form-group">
							<label class=" control-label"> Exam Type</label>
										<div class="">
											<select class="form-control"  id="exam_type" name="exam_type">
												<option value="">Select exam Type</option>
												<option value="Assignments"> Assignments </option>
												<option value="Mid">Mid</option>
												<option value="Quterly"> Quterly</option>
												<option value="Half Yearly"> Half Yearly</option>
												<option value="Yearly"> Yearly </option>
											</select>
										</div>
									</div>
                        </div>
						<div class="col-md-6">
							<div class="form-group">
							<label class=" control-label">Class</label>
										<div class="">
											<select class="form-control" id="class_id" name="class_id"> 
												<option value="">Select Class</option>
												<?php foreach($class_list as $list){ ?>
												<option value="<?php echo $list['id']; ?>"><?php echo $list['name'].' '.$list['section']; ?></option>
												<?php } ?>
												
											</select>
										</div>
									</div>
                        </div>
                        </div>
<div class="row" style="padding-bottom:-20px;">	
	
<div class="col-sm-3 nopadding">
  <div class="form-group">
   <label> Select Class</label>
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
      <label> Select Date</label>
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
     <label> Exam Start Time</label>
  </div>
</div>

<div class="col-sm-3 nopadding">
  <div class="form-group">
     <label>Exam End Time</label>
    </div>
  </div>
</div>
<div class="clear"></div>

<div class="row">	
	<div id="education_fields">

	</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <select class="form-control" id="educationDate" name="educationDate[]">
      
        <option value="">Subject</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
      </select>
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
      <input type="text" class="form-control"  value="" placeholder="EX:DD-MM-YYYY">
  </div>
</div>
<div class="col-sm-3 nopadding">
  <div class="form-group">
    <input type="text" class="form-control" id="Degree" name="Degree[]" value="" placeholder="EX:10 AM">
  </div>
</div>

<div class="col-sm-3 nopadding">
  <div class="form-group">
    <div class="input-group">
         <input type="text" class="form-control" id="Major" name="Major[]" value="" placeholder="EX:01 PM">

      <div class="input-group-btn">
        <button class="btn btn-success" type="button"  onclick="education_fields();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
    </div>
  </div>
</div>
<div class="clear"></div>
</div>
						<!--<div class="col-md-3">
							<div class="form-group">
							<label class=" control-label">Room No</label>
								<div class="">
									<input type="text" name="room_no" id="room_no" class="form-control" placeholder="Enter room No">
								</div>
							</div>
                        </div>
						<div class="col-md-3">
							<div class="form-group">
							<label class=" control-label">Invigilator</label>
										<div class="">
										<select class="form-control" id="teacher_id" name="teacher_id"> 
										<option value="">Select</option>
										<?php foreach($teachers_list as $list){ ?>
										<option value="<?php echo $list['u_id']; ?>"><?php echo $list['name']; ?></option>
										<?php } ?>

									</select>
										</div>
									</div>
                        </div>
					-->
							
						<div class="col-md-12">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit" class="btn btn-primary pull-right " name="signup" value="Sign up">Create Exam</button>
							</div>
							<!-- /.input group -->
						  </div>
                        </div>
					
						<div class="clearfix">&nbsp;</div>
						
						
						
						
					
						<div class="clearfix">&nbsp;</div>
						 
						
                    </form>
					<div class="clearfix">&nbsp;</div>
	<?php if(isset($exam_time_table_list) && count($exam_time_table_list)>0){ ?>
		<div class="box attentdence-table" style="">
            <div class="box-header">
              <h3 class="">Exam Timetable List </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
			<form>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="display:none;">id</th>
                  <th>Exam Type</th>
				  <th>Class</th>
                  <th>Section</th>
                  <th>Subject</th>
                  <th>Date</th>
                  <th>Exam Start Time</th>
                  <th>Exam End Time</th>
                  <th>Room No</th>
                  <th>Invigilator</th>
                  <th>Status</th>
                  <th>Action(Edit / Delete)</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($exam_time_table_list as $list){ ?>
                <tr>
                  <td style="display:none;"><?php echo $list['id']; ?> </td>
                  <td><?php echo $list['exam_type']; ?> </td>
				  <td><?php echo $list['name']; ?></td>
                  <td><?php echo $list['section']; ?></td>
                  <td><?php echo $list['subname']; ?></td>
                  <td><?php echo $list['exam_date']; ?></td>
                  <td><?php echo $list['start_time']; ?> </td>
                  <td><?php echo $list['to_time']; ?></td>
                  <td><?php echo $list['room_no']; ?> </td>
                  <td><?php echo $list['teacher_name']; ?> </td>
				 <td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
				  <td>
					<a href="<?php echo base_url('examination/edit/'.base64_encode($list['id'])); ?>" class="btn btn-warning btn-sm">Edit</a>
				    <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="fa fa-info-circle btn btn-warning"></i></a>
					<a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['id']) ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
									
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
<script>
var room = 1;
function education_fields() {
 
    room++;
    var objTo = document.getElementById('education_fields')
    var divtest = document.createElement("div");
	divtest.setAttribute("class", "form-group removeclass"+room);
	var rdiv = 'removeclass'+room;
    divtest.innerHTML = '<div class="col-sm-3 nopadding"><div class="form-group"><select class="form-control" id="educationDate" name="educationDate[]"><option value="">Subject</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option> </select></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" value="" placeholder="EX:DD-MM-YYYY"></div></div><div class="col-sm-3 nopadding"><div class="form-group"> <input type="text" class="form-control" value="" placeholder="EX:10 AM"></div></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="input-group"> <input type="text" class="form-control" value="" placeholder="EX:01 PM"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_education_fields('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';
    
    objTo.appendChild(divtest)
}
   function remove_education_fields(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>

  <script type="text/javascript">
   function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('examination/status'); ?>"+"/"+id);
} 
function adminstatus(id){
	if(id==1){
			$('#content1').html('Are you sure you want to Deactivate?');
		
	}if(id==0){
			$('#content1').html('Are you sure you want to activate?');
	}
}
  function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('examination/delete'); ?>"+"/"+id);
}
function admindedeletemsg(id){
	$('#content1').html('Are you sure you want to delete?');
	
}
$(document).ready(function() {
   
    $('#addexam_form').bootstrapValidator({
		fields: {
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
			subject: {
                validators: {
                    notEmpty: {
                        message: 'Subject is required'
                    }
                }
            },
			exam_date: {
                validators: {
                    notEmpty: {
						message: 'Date of Birth is required'
					},
					date: {
                        format: 'DD-MM-YYYY',
                        message: 'The value is not a valid date'
                    }
                }
            },start_time: {
                validators: {
                    notEmpty: {
                        message: 'Start Time is required'
                    }
                }
            },to_time: {
                validators: {
                    notEmpty: {
                        message: 'End Time is required'
                    }
                }
            },room_no: {
                validators: {
                    notEmpty: {
                        message: 'Room Number is required'
                    },regexp: {
					regexp:  /^[0-9]*$/,
					message:'Room Number must be digits'
					}
                }
            },
			teacher_id: {
                validators: {
                    notEmpty: {
                        message: 'Invigilator is required'
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
   
  });
</script>

