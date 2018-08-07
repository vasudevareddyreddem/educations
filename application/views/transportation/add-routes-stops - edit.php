<?php //echo'<pre>';print_r($route);exit;?>
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
              <h3 class="box-title">edit Routes and Stops</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class=""><a href="#tab_1" data-toggle="tab">edit Routes and Stops</a></li>
               
 </a></li>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" >
              	<div class="">
        <div class="control-group" id="fields">
           
            <div class="controls"> 
              <form id="defaultForm1" method="POST" class="" action="<?php echo base_url('transportation/edit_post'); ?>">

					<div class="col-md-4">
							<div class="form-group">
								<label class=" control-label">Route Number</label>
								<div class="">
									<input placeholder="Enter Route" class="form-control" name="route_no" id="route_no" value="<?php echo isset($route['route_no'])?$route['route_no']:''; ?>">
								</div>
							</div>
                        </div>
						
                       
						<div class="clearfix"></div>

                    <div class=" ">
                    <div class="entry input-group col-md-4 ">
					
                        <input class="form-control" name="stop_name" id="stop_name" type="text" placeholder="Enter stop" value="<?php echo isset($stop_list['stop_name'])?$stop_list['stop_name']:''; ?>">
						
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
							  <button type="submit"  class="btn btn-primary " id="validateBtn" name="validateBtn" value="check">Add Route</button>
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

