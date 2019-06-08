
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Home Work List
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Home Work List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				<th>S. No</th>
				<th>Class</th>
				<th>Subject</th>
				<th>Date of Home Work</th>
				<th>Submission Date</th>
				<th>Home Work</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
                </thead>
                <tbody>
				<?php if(isset($home_work_list) && count($home_work_list)>0){ ?>
						<?php $cnt=1;foreach($home_work_list as $list){ ?>
							<tr>
								  <td><?php echo $cnt; ?></td>
								  <td><?php echo isset($list['name'])?$list['name']:''?><?php echo isset($list['section'])?$list['section']:''?></td>
								  <td><?php echo isset($list['subjects'])?$list['subjects']:''?></td>
								  <td><?php echo isset($list['work_date'])?$list['work_date']:''?></td>
								  <td><?php echo isset($list['work_sub_date'])?$list['work_sub_date']:''?></td>
								  <td><?php echo isset($list['work'])?$list['work']:''?></td>
								  <td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
								  <td>
									  <a href="<?php echo base_url('student/homeworkedit/'.base64_encode($list['h_w_id'])); ?>"  data-toggle="tooltip" title="Edit"><i class="fa fa-pencil btn btn-success"></i></a>
									  <a href="javascript;void(0);" onclick="admindeactive('<?php echo base64_encode(htmlentities($list['h_w_id'])).'/'.base64_encode(htmlentities($list['status']));?>');adminstatus('<?php echo $list['status'];?>')" data-toggle="modal" data-target="#myModal" title="Edit"><i class="fa fa-info-circle btn btn-warning"></i></a>
									  <a href="javascript;void(0);" onclick="admindedelete('<?php echo base64_encode($list['h_w_id']) ?>');admindedeletemsg();" data-toggle="modal" data-target="#myModal" title="Delete"><i class="fa fa-trash btn btn-danger"></i></a>
								</td>
							</tr>
						<?php $cnt++;} ?>
				
				<?Php } ?>
                
                
                </tbody>
                <tfoot>
                  <tr>
                  <th>S. No</th>
				<th>Class</th>
				<th>Subject</th>
				<th>Date of Home Work</th>
				<th>Submission Date</th>
				<th>Home Work</th>
				<th>Status</th>
				<th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
			
			<div style="padding:10px">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 style="pull-left" class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
			<div class="alert alert-danger alert-dismissible" id="errormsg" style="display:none;"></div>
			  <div class="row">
				<div id="content1" class="col-xs-12 col-xl-12 form-group">
				Are you sure ? 
				</div>
				<div class="col-xs-6 col-md-6">
				  <button type="button" aria-label="Close" data-dismiss="modal" class="btn  blueBtn">Cancel</button>
				</div>
				<div class="col-xs-6 col-md-6">
                <a href="?id=value" class="btn  blueBtn popid" style="text-decoration:none;float:right;"> <span aria-hidden="true">Ok</span></a>
				</div>
			 </div>
		  </div>
      </div>
      
    </div>
  </div>
<script>
 function admindeactive(id){
	$(".popid").attr("href","<?php echo base_url('student/homeworkstatus'); ?>"+"/"+id);
} 
function adminstatus(id){
	if(id==1){
			$('#content1').html('Are you sure you want to Deactivated?');
		
	}if(id==0){
			$('#content1').html('Are you sure you want to Activated?');
	}
}
function admindedelete(id){
	$(".popid").attr("href","<?php echo base_url('student/homeworkdelete'); ?>"+"/"+id);
}
function admindedeletemsg(id){
	$('#content1').html('Are you sure you want to delete?');
	
}

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