<style>
.entry:not(:first-of-type)
{
    margin-top: 10px;
}

.glyphicon
{
    font-size: 12px;
}
.input-group[class*=col-] {
    float: none;
    padding-right: 14px;
    padding-left: 14px;
}
</style>
<div class="content-wrapper">
   <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update Routes and Stops</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
           
            <div class="tab-content">
              <div class="" id="tab_1">
              	<div class="">
        <div class="control-group" id="fields">
           
            <div class="controls"> 
                <form id="addroute"  method="post"  action="<?php echo base_url('transportation/addroutespost'); ?>">
					<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Route Number</label>
								<div class="">
									<input placeholder="Enter Route " class="form-control" name="route_no" id="route_no"  value="<?php echo $routes_details['route_no']; ?>">
								</div>
							</div>
                        </div>
						<div class="clearfix"></div>
                    <div class=" ">
					<?php foreach($routes_details['stop_list'] as $list){ ?>
					
                    <div class="entry input-group col-md-4 ">
					
					
                        <input class="form-control" name="route_stops[]" id="route_stops[]" type="text" value="<?php echo $list['stop_name']; ?>" placeholder="Enter stop" />
						<span class="input-group-btn">
						
                            <button class="btn btn-danger btn-remove" type="button">
                                <span class="glyphicon glyphicon-minus"></span>
                            </button>
                        </span>
						</div>
					<?php } ?>
					<div class="entry input-group col-md-4 ">
					
					
                        <input class="form-control" name="route_stops[]" id="route_stops[]" type="text" value="<?php echo $list['stop_name']; ?>" placeholder="Enter stop" />
						<span class="input-group-btn">
						
                            <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
						</div>
                    	
					
					</div>
                    
                
         
            </div>
        </div>
		<div class="clearfix"> </div>						
						<div class="col-md-3">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit"  class="btn btn-primary " id="validateBtn" name="validateBtn" value="check">Update Route</button>
							</div>
							<!-- /.input group -->
						  </div>
                        </div>
		</form>
		<div class="clearfix"> </div>
	</div>
              </div>
              <!-- /.tab-pane -->
             
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

