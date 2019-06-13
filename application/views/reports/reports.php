<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Reports</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
            <form id="defaultForm" method="post" class="" action="<?php echo base_url('reports/add'); ?>">
						<div class="col-md-4">
							<div class="form-group">
							<label class=" control-label">Reports</label>
										<div class="">
											<select class="form-control" id="reports_id" name="reports_id" onchange="get_student_subject_list(this.value);" >
												<option value="">Select Reports</option>
												<option value="Fee Report">Fee Report</option>
												<option value="Due Report">Due Report</option>
												<option value="Paid Report">Paid Report</option>
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
					
				<div class="box attentdence-table" style="">
					<div class="box-header">
					  <h3 class="">Reports List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
						  <th>Roll No</th>
						  <th>Name</th>
						  <th>Subject</th>
						  <th>Exam Type</th>
						  <th>Marks Obtained</th>
						  <th>Maximum Marks</th>
						  
						</tr>
						</thead>
						<tbody>
						<tr>
						   <th>fff</th>
						  <th>fff</th>
						  <th>fff</th>
						  <th>ggg</th>
						  <th>vvv</th>
						  <th>vvv</th>
						</tr>
					
						
						
											
						
						</tbody>
						
					  </table>
					  <div class="clearfix">&nbsp;</div>
					 
					 
					</div>
					<!-- /.box-body -->
				  </div>
		 
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
            reports_id: {
                validators: {
                    notEmpty: {
                        message: 'Reports is required'
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

