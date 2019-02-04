<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Syllabus List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            	
				<div >
					
					<!-- /.box-header -->
					<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th>Class</th>
						
						  <th>Action</th>
						
						</tr>
						</thead>
						<tbody>
						
						<tr>
						   <th>10th class</th>
						
						   <th class="text-center">
							<a class="btn btn-sm btn-primary">Download</a>
						   </th>
						</tr>
					
						
						
											
						
						</tbody>
						
					  </table>
					  <div class="clearfix">&nbsp;</div>
					
					</div>
					<!-- /.box-body -->
				  </div>
		
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
			subject: {
                validators: {
                    notEmpty: {
                        message: 'Subject is required'
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

function get_student_allsubjects_list(student_id){
	if(student_id !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('Examination/get_student_allsubjects_list');?>",
   			data: {
				student_id: student_id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#subject').empty();
							$('#subject').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#subject').append("<option value="+parsedData.list[i].name+">"+parsedData.list[i].subject+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}









</script>