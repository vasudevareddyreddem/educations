<?php //echo'<pre>';print_r($book);exit;?>
<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add Book</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="<?php if(isset($tab) && $tab==''){ echo "active";} ?>"><a href="#tab_1" data-toggle="tab">Add  New Book
</a></li>
              <li class="<?php if(isset($tab) && $tab==1){ echo "active";} ?>"><a href="#tab_2" data-toggle="tab">Book Details </a></li>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane <?php if(isset($tab) && $tab==''){ echo "active";} ?>" id="tab_1">
              <form id="defaultForm1" method="POST" class="" action="<?php echo base_url('librarian/add_book_post'); ?>">
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Book Number</label>
								<div class="">
									<input class="form-control" name="book_number" id="book_number">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Book Title</label>
								<div class="">
									<input class="form-control" name="book_title" id="book_title">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Author Name</label>
								<div class="">
									<input class="form-control" name="author_name" id="author_name">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Publisher</label>
								<div class="">
									<input class="form-control" name="publisher" id="publisher">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Category</label>
								<div class="">
									<input class="form-control" name="category" id="category">
								</div>
							</div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">ISBN</label>
								<div class="">
									<input class="form-control" name="isbn" id="isbn">
								</div>
							</div>
                        </div>	
						
							
						<div class="col-md-4">
							<div class="form-group">
								<label> Date arrived</label>

								<div class="input-group date">
								  <div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								  </div>
								  <input type="text" name="date" class="form-control pull-right" id="datepicker" required>
								</div>
								<!-- /.input group -->
							</div>
                        </div>	
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Price</label>
								<div class="">
									<input class="form-control" name="price" id="price">
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Quantity</label>
								<div class="">
									<input class="form-control" name="qty" id="qty">
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Shelf No</label>
								<div class="">
									<input class="form-control" name="shelf_no" id="shelf_no">
								</div>
							</div>
                        </div>	
						<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Department</label>
								<div class="">
									<input class="form-control" name="department" id="department">
								</div>
							</div>
                        </div>		
<div class="clearfix"> </div>						
						<div class="col-md-3">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit"  class="btn btn-primary " name="submit" value="check">Add Book</button>
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
                  <th>Book No</th>
                  <th>ISBN</th>
                  <th>Book Title</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Date Arrived</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Shelf No</th>
                  <th>Department</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($book_list as $list){ ?>
                <tr>
				
                  <td><?php echo $list['book_number']; ?></td>
                  <td><?php echo $list['isbn']; ?></td>
                  <td><?php echo $list['book_title']; ?></td>
                  <td><?php echo $list['author_name']; ?></td>
                  <td><?php echo $list['publisher']; ?></td>
                  <td><?php echo $list['date']; ?></td>
                  <td><?php echo $list['price']; ?></td>
                  <td><?php echo $list['qty']; ?></td>
                  <td><?php echo $list['shelf_no']; ?></td>
                  <td><?php echo $list['department']; ?></td>
				 <td><?php if($list['status']==1){ echo "Active";}else{ echo "Deactive"; } ?></td>
                  <td>
					  <a class="fa fa-pencil btn btn-success" href="<?php echo base_url('librarian/edit/'.base64_encode($list['b_id'])); ?>" >Edit</a>  
					  <a class="fa fa-info-circle btn btn-warning" href="<?php echo base_url('librarian/status/'.base64_encode ($list['b_id']).'/'.base64_encode($list['status']));?>" >Status</a> 
					  <a class="fa fa-trash btn btn-danger" href="<?php echo base_url('librarian/delete/'.base64_encode($list['b_id']));?>" >Delete</a> 
					  
				  </td>
                </tr>            
				<?php } ?>
			
				</tbody>
				 <tfoot>
                <tr>
                  <th>Book No</th>
                  <th>ISBN</th>
                  <th>Book Title</th>
                  <th>Author</th>
                  <th>Publisher</th>
                  <th>Date Arrived</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Shelf No</th>
                  <th>Department</th>
                  <th>Status</th>
                  <th>Action</th>
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
            
			book_number:{
			   validators: {
					notEmpty: {
						message: 'book number is required'
					}
				}
            },
			   
			book_title:{
			   validators: {
					notEmpty: {
						message: 'book title is required'
					}
				}
            },
			author_name:{
			   validators: {
					notEmpty: {
						message: 'author name is required'
					}
				}
            },
			publisher:{
			   validators: {
					notEmpty: {
						message: 'Publisher is required'
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
			isbn:{
			   validators: {
					notEmpty: {
						message: 'isbn is required'
					}
				}
            },
			date:{
			   validators: {
					notEmpty: {
						message: 'Date arrived is required'
					}
				}
            },
			price: {
                validators: {
                    notEmpty: {
                        message: 'Price is required'
                    },
					regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Price must be digits'
   					}
                }
            },
			   qty:{
			   validators: {
					notEmpty: {
						message: 'Quantity is required'
					},regexp: {
					regexp: /^[0-9. ]+$/,
					message: 'Quantity can only consist of alphanumeric, space and dot'
					}
				}
            }, 
			   
			shelf_no:{
			   validators: {
					notEmpty: {
						message: 'shelf_no is required'
					}
				}
            },
			
			department:{
			   validators: {
					notEmpty: {
						message: 'department is required'
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

