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
			<!--<table id="example" class="display select table table-bordered table-striped" cellspacing="0" width="100%">
   <thead>
      <tr>
         <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
          <th>Roll No</th>
		  <th>Name</th>
		  <th>Subject</th>
		 
		  <th>Remarks</th>
      </tr>
   </thead>
      <tbody>
		<tr>
			<td><input type="checkbox"></td>
			<td>15</td>
			<td>Bayapureddy</td>
			<td>Mathamatics</td>
	
			<td><input class="form-control" type="text" placeholder="Remarks"/></td>
		</tr>
			<tr>
			<td><input type="checkbox"></td>
			<td>15</td>
			<td>Bayapureddy</td>
			<td>Mathamatics</td>
	
			<td><input class="form-control" type="text" placeholder="Remarks"/></td>
		</tr>
			<tr>
			<td><input type="checkbox"></td>
			<td>15</td>
			<td>Bayapureddy</td>
			<td>Mathamatics</td>
	
			<td><input class="form-control" type="text" placeholder="Remarks"/></td>
		</tr>
			<tr>
			<td><input type="checkbox"></td>
			<td>15</td>
			<td>Bayapureddy</td>
			<td>Mathamatics</td>
	
			<td><input class="form-control" type="text" placeholder="Remarks"/></td>
		</tr>
			<tr>
			<td><input type="checkbox"></td>
			<td>15</td>
			<td>Bayapureddy</td>
			<td>Mathamatics</td>
	
			<td><input class="form-control" type="text" placeholder="Remarks"/></td>
		</tr>
		
		

		
		
	  </tbody>
  
</table>-->
		
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
					<input type="hidden" name="subject_id" value="<?php echo isset($subject_name['subject'])?$subject_name['subject']:''; ?>">
					<input type="hidden" name="time" value="<?php echo isset($subject_name['time'])?$subject_name['time']:''; ?>">
                  <td><?php echo isset($list['roll_number'])?$list['roll_number']:''; ?> </td>
				  <td><?php echo isset($list['name'])?$list['name']:''; ?></td>
				  <td><?php echo isset($subject_name['subject']) ?$subject_name['subject']:''; ?></td>
				    <td>
					<input type="checkbox" id="attendence<?php echo $cnt; ?>" onclick="get_attandence(<?php echo $cnt; ?>)" name="attendence[]" value="Present">Present<br>
                    <input type="checkbox" id="attendences<?php echo $cnt; ?>" onclick="get_attandence(<?php echo $cnt; ?>)" name="attendence[]" value="Absent">Absent<br>
					
					</td>
                  <td>
				  <input type="text"class="form-control" name="remarks[]" placeholder="Remarks" value=""> 
				  
				  </td>
				  
				  </tr>
				
				<?php $cnt++;} ?>
					
                </tbody>
				<?php //echo'<pre>';print_r($student_list);exit; ?>

              </table>
			  <div class="clearfix">&nbsp;</div>
               <button type="submit" class="btn btn-primary col-md-offset-4">Update Attendance</button>
			 
			  </form>
            </div>
           
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
 function get_attandence(id){
	 
	 var check_one=document.getElementById("attendence"+id).checked;
	 var check_two=document.getElementById("attendences"+id).checked;
	 if(check_one ==true && check_two == false){
		document.getElementById("attendences"+id).checked = false; 
	 }else if(check_two ==true && check_one ==false){
		document.getElementById("attendence"+id).checked = false; 
	 }else if(check_one ==true){
		document.getElementById("attendence"+id).checked = false; 
	 }
	 
	 
 }
  function checkvalidation(){
	 var ids=$('#subjects').val(); 
	 if(ids==''){
		// alert('Please select subject');return false;
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
   							$('#subjects').append("<option value="+data.list[i].subject+">"+data.list[i].subject+"</option>");                      
                       }
				}
			
			});

	}
	  
  }
  
  
  function get_subject_wise_timings(subjects){
	  	if(subjects!=''){
			jQuery.ajax({

			url: "<?php echo base_url('student/get_subject_wise_timings');?>",
			type: 'post',
			data: {
			subjects: subjects,
			},
			dataType: 'json',
				success: function (data) {
						$('#time').empty();
   						$('#time').append("<option value=''>select</option>");
   						for(i=0; i<data.list.length; i++) {
   							$('#time').append("<option value="+data.list[i].timings+">"+data.list[i].timings+"</option>");                      
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
						message: 'Class is required'
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
  $(document).ready(function (){
   var table = $('#example').DataTable({
      
      'columnDefs': [{
         'targets': 0,
         'searchable': false,
         'orderable': false,
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
         }
      }],
      'order': [[1, 'asc']]
   });

   // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   // Handle click on checkbox to set state of "Select all" control
   $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });

   // Handle form submission event
   $('#frm-example').on('submit', function(e){
      var form = this;

      // Iterate over all checkboxes in the table
      table.$('input[type="checkbox"]').each(function(){
         // If checkbox doesn't exist in DOM
         if(!$.contains(document, this)){
            // If checkbox is checked
            if(this.checked){
               // Create a hidden element
               $(form).append(
                  $('<input>')
                     .attr('type', 'hidden')
                     .attr('name', this.name)
                     .val(this.value)
               );
            }
         }
      });
   });

});
</script>