
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->

                <div class="box box-primary">
                    

                    <!-- /.box-header -->
                    <!-- form start -->
                    <div style="padding:20px;">
                        
                        
						<?php if(isset($hall_ticket)&& count($hall_ticket)>0){?>
                        <div class="attentdence-table" id="">
						 
                            <h2 class="text-center">Student Hall Ticket</h2><br>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Roll Number</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="<?php echo isset($hall_ticket['roll_number'])?$hall_ticket['roll_number']:''?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Class</label>
                                            <div class="">
                                                <input class="form-control" name="" id="showHallticket" value="<?php echo isset($hall_ticket['name'])?$hall_ticket['name']:''?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Section</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="<?php echo isset($hall_ticket['section'])?$hall_ticket['section']:''?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class=" control-label">Candidate's Name</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="<?php echo isset($hall_ticket['student_name'])?$hall_ticket['student_name']:''?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Gender</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="<?php echo isset($hall_ticket['gender'])?$hall_ticket['gender']:''?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" control-label">Father's Name</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="<?php echo isset($hall_ticket['parent_name'])?$hall_ticket['parent_name']:''?>" disabled>
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
                                                <td><?php echo isset($hall_ticket['subject'])?$hall_ticket['subject']:'' ?></td>
                                                <td><?php echo isset($hall_ticket['exam_date'])?$hall_ticket['exam_date']:'' ?></td>
                                                <td><?php echo isset($hall_ticket['start_time'])?$hall_ticket['start_time']:'' ?>&nbsp; to&nbsp;<?php echo isset($hall_ticket['to_time'])?$hall_ticket['to_time']:'' ?></td>
                                                <td></td>
                                            </tr>
                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <p>NOTE :</p>
                                <?php if(isset($exam_instructions)&& count($exam_instructions)>0){ ?>
								<?php  foreach($exam_instructions as $li){?>
                                
                                    <li><?php echo isset($li['instructions'])?$li['instructions']:''?></li>
                               
								<?php }?>
								<?php }?>
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
