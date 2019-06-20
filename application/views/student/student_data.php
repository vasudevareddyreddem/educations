 <?php if(isset($student_list) && count($student_list)>0){ ?>
 
<div class="box-body table-responsive" style="background:#fff;">
               <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Reg No</th>
                  <th>Roll No</th>
                  <th>Partent</th>
                  <th>Contact No</th>
                  <th>Email</th>
                  <th>Address</th>
                  
                </tr>
                </thead>
                <tbody>
				<?php foreach($student_list as $list){ ?>
                <tr>
                  <td><?php echo $list['name']; ?> </td>
                  <td><?php echo $list['u_id']; ?></td>
				   <td><?php echo $list['roll_number']; ?></td>
                  <td><?php echo $list['parent_name']; ?></td>
                  <td><?php echo $list['mobile']; ?></td>
                  <td><?php echo $list['email']; ?></td>
                  <td>
					  <?php echo isset($list['address'])?$list['address'].',':''; ?>
					  <?php echo isset($list['current_city'])?$list['current_city'].',':''; ?>
					  <?php echo isset($list['current_state'])?$list['current_state'].',':''; ?>
					  <?php echo isset($list['current_country'])?$list['current_country'].',':''; ?>
					  <?php echo isset($list['current_pincode'])?$list['current_pincode'].'.':''; ?>
				 </td>
                </tr>
				<?php } ?>
					</tbody>
                <tfoot>
                <tr>
                <th>Name</th>
                  <th>Reg No</th>
                  <th>Roll No</th>
                  <th>Partent</th>
                  <th>Contact No</th>
                  <th>Email</th>
                  <th>Address</th>
                </tr>
                </tfoot>
              </table>
            </div>
				
				
					
                
                
			  
 <?php }else{ ?>
 <div> No data available</div>
 <?php }?>
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
