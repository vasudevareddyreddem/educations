
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Student Hall Ticket</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div style="padding:20px;">
                        <form id="defaultForm" method="post" class="" action="">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class=" control-label">Class</label>
                                    <div class="">
                                        <select id="class_id" name="class_id" class="form-control" onchange="get_student_list(this.value);">
                                           <option value="">Select Class</option>
										   <?php if(isset($class_list) && count($class_list)>0){ ?>
											<?php foreach($class_list as $list){ ?>
											
													<?php if($exam_hallticket['class_id']==$list['id']){ ?>
															<option selected value="<?php echo $list['id']; ?>"><?php echo $list['name'].' '.$list['section']; ?></option>
													<?php }else{ ?>
															<option value="<?php echo $list['id']; ?>"><?php echo $list['name'].' '.$list['section']; ?></option>
													<?php } ?>
											<?php } ?>
										<?php } ?>
										
												
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class=" control-label">Student</label>
                                    <div class="">
                                        <select id="student_id" name="student_id"  class="form-control" >
									<option value="">Select</option>
									<?php if(isset($student_list) && count($student_list)>0){ ?>
											<?php foreach($student_list as $list){ ?>
											
													<?php if($exam_hallticket['student_id']==$list['u_id']){ ?>
															<option selected value="<?php echo $list['u_id']; ?>"><?php echo $list['name']; ?></option>
													<?php }else{ ?>
															<option value="<?php echo $list['u_id']; ?>"><?php echo $list['name']; ?></option>
													<?php } ?>
											<?php } ?>
										<?php } ?>
									</select>
                                    </div>
                                </div>
                            </div>
							 <div class="col-md-4">
                                <div class="form-group">
                                    <label class=" control-label">Exam Type</label>
                                    <div class="">
                                       <select class="form-control"  id="exam_type" name="exam_type">
												<option value="">Select exam Type</option>
												<option value="Assignments" <?php if($exam_hallticket['exam_type']=='Assignments'){ echo "selected"; } ?>> Assignments </option>
												<option value="Mid"<?php if($exam_hallticket['exam_type']=='Mid'){ echo "selected"; } ?>>Mid</option>
												<option value="Quterly" <?php if($exam_hallticket['exam_type']=='Quterly'){ echo "selected"; } ?>> Quterly</option>
												<option value="Half Yearly" <?php if($exam_hallticket['exam_type']=='Half Yearly'){ echo "selected"; } ?>> Half Yearly</option>
												<option value="Yearly" <?php if($exam_hallticket['exam_type']=='Yearly'){ echo "selected"; } ?>> Yearly </option>
											</select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <br>
                                <button type="submit" id="showHallticket" class="btn btn-primary" name="signup" value="submit">Generate Hall Ticket</button>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                        </form>

                        <br><hr>
						<?php if(isset($exam_hallticket)&& count($exam_hallticket)>0){?>
                        <div class="attentdence-table" id="">
                            <h2 class="text-center">Student Hall Ticket</h2><br>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Roll Number</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="<?php echo isset($exam_hallticket['roll_number'])?$exam_hallticket['roll_number']:''?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Class</label>
                                            <div class="">
                                                <input class="form-control" name="" id="showHallticket" value="<?php echo isset($exam_hallticket['name'])?$exam_hallticket['name']:''?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Section</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="<?php echo isset($exam_hallticket['section'])?$exam_hallticket['section']:''?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class=" control-label">Candidate's Name</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="<?php echo isset($exam_hallticket['student_name'])?$exam_hallticket['student_name']:''?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Gender</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="<?php echo isset($exam_hallticket['gender'])?$exam_hallticket['gender']:''?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" control-label">Father's Name</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="<?php echo isset($exam_hallticket['parent_name'])?$exam_hallticket['parent_name']:''?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" control-label">Mother's Name</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="Hey!" disabled>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>

                            <div class="clearfix">&nbsp;</div>

                            <div class="" style="padding:20px;">
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Subject</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Invigilator Sign</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?php echo isset($exam_hallticket['subject'])?$exam_hallticket['subject']:'' ?></td>
                                                <td><?php echo isset($exam_hallticket['exam_date'])?$exam_hallticket['exam_date']:'' ?></td>
                                                <td><?php echo isset($exam_hallticket['start_time'])?$exam_hallticket['start_time']:'' ?>&nbsp; to&nbsp;<?php echo isset($exam_hallticket['to_time'])?$exam_hallticket['to_time']:'' ?></td>
                                                <td></td>
                                            </tr>
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <p>NOTE :</p>
                                <ol type="1">
                                    <li>These are the rules you have to follow in the examination strictly</li>
                                    <li>These are the rules you have to follow in the examination strictly</li>
                                    <li>These are the rules you have to follow in the examination strictly</li>
                                </ol>
                            </div>
                            
                            <div class="col-md-4 pull-right">
                                <div class="form-group">
                                    <label class="text-center control-label">Principal Signature</label>
                                    <div class="">
                                        <input class="form-control" name="" id="" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                        </div>
						<?php } ?>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!--/.col (right) -->
    </section>
</div>


<script>
$(document).ready(function(){
	$("#HTFormat").css("display", "none");
    $("#showHallticket").click(function(){
        $("#HTFormat").css("display", "block");
    });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#attentdence").click(function(){
        $(".attentdence-table").toggle();
    });
});
  
  </script>
<script>
function get_student_list(class_id){
	if(class_id !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('Examination/class_student_list');?>",
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
<script type="text/javascript">
$(document).ready(function() {
   $('#defaultForm').bootstrapValidator({
//     
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
			student_id: {
                validators: {
                    notEmpty: {
                        message: 'Student is required'
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
