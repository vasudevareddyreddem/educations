<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Book Damage/Book Lost</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
		 <ul class="nav nav-tabs">
              <li class="<?php if(isset($tab) && $tab==''){ echo "active";} ?>"><a href="#tab_1" data-toggle="tab">Book Damage / Book Lost
</a></li>
              <li class="<?php if(isset($tab) && $tab==1){ echo "active";} ?>"><a href="#tab_2" data-toggle="tab">Book Damage / Book Lost List</a></li>
             
            </ul>
		 
            <div class="tab-content">
              <div class="tab-pane <?php if(isset($tab) && $tab==''){ echo "active";} ?>" id="tab_1">
              <form id="defaultForm1" method="POST" class="" action="<?php echo base_url('librarian/book_damage_post'); ?>">
			
				<div class="clearfix"> &nbsp;</div>
 						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Enter Class list</label>
								<div class="">
								<select id="book_title" name="book_title"  class="form-control" >
								<option value="">Select</option>
								<?php foreach ($book_list_id as $list){ ?>
								<option value="<?php echo $list['b_id']; ?>"><?php echo $list['book_title']; ?></option>
								<?php }?>
								</select>
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Student Name</label>
								<div class="">
									<input placeholder="Enter Student No"  class="form-control" name="student_no" id="student_no" >
								</div>
							</div>
                        </div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Book No</label>
								<div class="">
								<select id="author_name" name="author_name"  class="form-control" >
								<option value="">Select</option>
								<?php foreach ($author as $list){ ?>
								<option value="<?php echo $list['b_id']; ?>"><?php echo $list['author_name']; ?></option>
								<?php }?>
								</select>
								</div>
							</div>
                        </div>
					
								<div class="col-md-4">
							<div class="form-group">
							<label class=" control-label">Return</label>
										<div class="">
											<select class="form-control" name="return_type" id="return_type"> 
												<option value="">Select type</option>
													<option value="Amount">Amount </option>
													<option value="Replace Book">Replace Book </option>
											</select>
										</div>
									</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Price</label>
								<div class="">
								<select id="price" name="price"  class="form-control" >
								<option value="">Select</option>
								<?php foreach ($price as $list){ ?>
								<option value="<?php echo $list['b_id']; ?>"><?php echo $list['price']; ?></option>
								<?php }?>
								</select>
								</div>
							</div>
                        </div>
					
					
						
						
						<div class="clearfix"> </div>						
						<div class="col-md-3">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit"  class="btn btn-primary " name="submit" value="check">Submit Book</button>
							</div>
							<!-- /.input group -->
						  </div>
                        </div>
					
						<div class="clearfix">&nbsp;</div>
						
						
						
						
					
						<div class="clearfix">&nbsp;</div>
						 
						
                    </form>
              </div>
              <!-- /.tab-pane -->
                            <div class="tab-pane <?php if(isset($tab) && $tab==1){ echo "active";} ?>" id="tab_2">

				 <div class="clearfix"></div>
        
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Enter Book Title</th>
                  <th>Student No</th>
				  <th>Author Name</th>
                  <th>Student Name</th>
                  <th>Category</th>
                  <th>Return Type</th>
                  <th>Price</th>
                  <th>Submit Date</th>
               
                 
                </tr>
                </thead>
                <tbody>
				<?php foreach($damage_book as $list){ ?>
                <tr>
                  <td><?php echo $list['book_title']; ?></td>
                  <td><?php echo $list['student_no']; ?></td>
                  <td><?php echo $list['author_name']; ?></td>
                  <td><?php echo $list['student_id']; ?></td>
                  <td><?php echo $list['category']; ?></td>
                  <td><?php echo $list['return_type']; ?> </td>
                  <td><?php echo $list['price']; ?></td>
                  <td><?php echo $list['create_at']; ?></td>
                 
                </tr>
				<?php } ?>
				</tbody>
                <tfoot>
                <tr>
                  <th>Enter Book Title</th>
                  <th>Student No</th>
				  <th>Author Name</th>
                  <th>Student Name</th>
                  <th>Category</th>
                  <th>Return Type</th>
                  <th>Price</th>
                  <th>Submit Date</th>
               
                 
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
              </div>
              <!-- /.tab-pane -->
           
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
       
          <!-- /.box -->
		   <div class="clearfix"></div>
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
  
$(document).ready(function() {
   
    $('#defaultForm').bootstrapValidator({
//      
        fields: {
            firstName: {
                group: '.col-lg-4',
                validators: {
                    notEmpty: {
                        message: 'The first name is required and cannot be empty'
                    }
                }
            },
            
			book_title:{
			   validators: {
					notEmpty: {
						message: ' Book Title is required'
					}
				}
            },
			student_no:{
			   validators: {
					notEmpty: {
						message: 'Student No is required'
					}
				}
            },
			author_name:{
			   validators: {
					notEmpty: {
						message: 'Author Name is required'
					}
				}
            },
	
			student_id:{
                validators: {
                    notEmpty: {
                        message: 'Student Name is required'
                    },
					regexp: {
   					regexp: /^[a-zA-Z0-9. ]+$/,
   					message: 'Student Name  by can only consist of alphanumeric, space and dot'
   					}
                }
            },
			category:{
			   validators: {
					notEmpty: {
						message: 'Category is required'
					}
				}
            },
			return_type: {
                validators: {
                    notEmpty: {
                        message: 'Return is required'
                    }
                }
            },
			price:{
			   validators: {
					notEmpty: {
						message: 'Price is required'
					}
				}
            },
			
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
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

