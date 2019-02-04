<style>
.entry:not(:first-of-type)
{
    margin-top: 10px;
}

.glyphicon
{
    font-size: 12px;
}
</style>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo isset($details['id'])?'Edit Class Subject':'Add Class Subject'; ?>  
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> <?php echo isset($details['id'])?'Edit Class Subject':'Add Class Subject'; ?> </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
		<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="<?php if(isset($tab) && $tab=='' || $tab==0){ echo "active"; }?>"><a href="#tab_1" data-toggle="tab">Add Subjects</a></li>
              <li class="<?php if(isset($tab) && $tab==1){ echo "active"; }?>"><a href="#tab_2" data-toggle="tab">Subjects List</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php if(isset($tab) && $tab==''  || $tab==0){ echo "active"; }?>" id="tab_1">
              <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
             <form id="defaultForm" method="post" class="" action="<?php echo base_url('classwise/addsubjectpost'); ?>">
			 <input type="hidden" name="subject_id" id="subject_id" value="<?php echo isset($details['id'])?$details['id']:''; ?>">
						<div class="col-md-12">
							<div class="form-group">
								<label class=" control-label">Class Name</label>
								<div class="">
								<select id="class_id" name="class_id" class="form-control" >
								<option value="">Select</option>
								<?php foreach($class_list as $list){ ?>
								<?php if($details['class_id']==$list['id']){ ?>
									<option  selected value="<?php echo $list['id']; ?>"><?php echo $list['name'].' '.$list['section']; ?></option>
									<?php }else{ ?>
										<option value="<?php echo $list['id']; ?>"><?php echo $list['name'].' '.$list['section']; ?></option>
									<?php } ?>
								<?php } ?>
								</select>
								</div>
							</div>
                        </div>
                    </form>
					<div class="col-md-12">
          <div class="control-group" id="fields">
            <label class="control-label" for="field1">Add Subject</label>
            <div class="controls"> 
                <form role="form" autocomplete="off">
                    <div class="entry input-group ">
                        <input class="form-control" name="fields[]" type="text" placeholder="Subject name" />
                    	<span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
                    </div>
                </form>
           
            </div>
        </div>
				</div>
				<div class="clearfix">&nbsp;</div>
						  <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary" name="signup" value="Sign up"><?php echo isset($class_details['id'])?'Update Class':'Add Subject'; ?></button>
								<a href="<?php echo base_url('dashboard'); ?>" type="submit" class="btn btn-warning" >Back</a>
                                
                            </div>
                        </div>
					<div class="clearfix">&nbsp;</div>
				</div>
				</div>
                
              </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane <?php if(isset($tab) && $tab==1){ echo "active"; }?>" id="tab_2">
			
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Class Name</th>
                  <th>Subject</th>
                  <th>Created Date </th>	
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
								<tr>
								  <td>10th</td>
								  <td>
									<div>Mathamatics</div>
									<div>Mathamatics</div>
									<div>Mathamatics</div>
									<div>Mathamatics</div>
									<div>Mathamatics</div>
									<div>Mathamatics</div>
									
								  </td>
								  <td>29-01-2019</td>
								  
								
								  <td>
									  <a href="#"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
									
									  <a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['id']) ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
								</td>
							</tr>
		
                
                </tbody>
               
              </table>
            
    
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

 
 <script>

 function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('classwise/subjectstatus'); ?>"+"/"+id);
} 

function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('classwise/subjectdelete'); ?>"+"/"+id);
}


  $(function () {
    $("#example1").DataTable({
		 "order": [[0, "desc" ]]
	});

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
$(document).ready(function() {
 
   $('#defaultForm').bootstrapValidator({
//       
        fields: {
            name: {
                validators: {
					notEmpty: {
						message: 'Class Name is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Class Name can only consist of alphanumeric, space and dot'
					}
				}
            },
			section: {
                validators: {
					notEmpty: {
						message: 'Class Section is required'
					},
					regexp: {
                        regexp: /^[a-zA-Z0-9. ]+$/,
						message: 'Class Section can only consist of alphanumeric, space and dot'
                    }
				
				}
            },
            capacity: {
                validators: {
					notEmpty: {
						message: 'Capacity is required'
					},
					regexp: {
					regexp: /^[a-zA-Z0-9. ]+$/,
					message: 'Capacity can only consist of alphanumeric, space and dot'
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
$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});

</script>