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
              <h3 class="box-title">Transport Fee Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<div style="padding:20px;">
			 <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Add Transport Fee</a></li>
              <li><a href="#tab_2" data-toggle="tab">Transport Fee List</a></li>
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
              	<div class="">
        <div class="control-group" id="fields">
           
            <div class="controls"> 
                <form role="form" autocomplete="off" method="post" action="<?php echo base_url('transportation/transport_fee_details_post'); ?>">
					
                    <div class=" ">
                    <div class="entry input-group col-md-12 ">
					<div class="row">
					<div class="col-md-3">
					<div class="form-group">
								
								<div class="">
								<select id="route_id" name="route_id[]" onchange="get_stops_route_list(this.value);" class="form-control" >
								<option value="">Select</option>
								<?php foreach ($route as $list){ ?>
								<option value="<?php echo $list['v_id']; ?>"><?php echo $list['route_no']; ?></option>
								<?php }?>
								</select>
								</div>
							</div>
					</div>
						<div class="col-md-3">	
                       <div class="form-group">
								
								<div class="">
									<select id="stops" name="stops[]" class="form-control select">
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-3">	
							<input class="form-control" name="frequency[]"  class="form-control select" type="text" placeholder="Enter Frequency " />
						</div>
						<div class="col-md-2">	
							<input class="form-control" name="amount[]" class="form-control select"  type="text" placeholder="Amount / Anual " />
						</div>
						
                    	<span class="input-group-btn">
						
                            <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
					</div>
					</div>
					</div>
                    
                
         
            </div>
        </div>
		<div class="clearfix"> </div>						
						<div class="col-md-3">
							<div class="form-group">
							<label> &nbsp;</label>

							<div class="input-group ">
							  <button type="submit"  class="btn btn-primary " name="submit" value="check">Add Fee</button>
							  
							</div>
							<!-- /.input group -->
						  </div>
                        </div>
		</form>
		<div class="clearfix"> </div>
	</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
				 <div class="clearfix"></div>
        
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Route Number</th>
                  <th>Stops</th>
                  <th>Frequency </th>
                  <th>Amount </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>201</td>
                  <td>stop 1</td>
                  <td>12 Km</td>
                  <td>15000 / Anual</td>
               
                
                  <td>
					  <a class="btn btn-warning btn-sm" href="" >Edit</a> 
					  
				  </td>
                </tr>
				</tbody>
                
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
            
			 route_id: {
			   validators: {
					notEmpty: {
						message: 'Route Number is required'
					}
				}
            },
			stops:{
			 validators: {
					notEmpty: {
						message: 'Stops is required'
					}
				}
            },	
			frequency:{
                    validators: {
                    notEmpty: {
                        message: 'Frequency is required'
                    },
					regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Frequency must be digits'
   					}
                }
            },
			amount:{
                validators: {
                    notEmpty: {
                        message: 'Amount is required'
                    },
					regexp: {
   					regexp:  /^[0-9]*$/,
   					message:'Amount must be digits'
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
<script>
function get_stops_route_list(route_id){
	if(route_id !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('transportation/routes_stops');?>",
   			data: {
				route_id: route_id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
						if(data.msg=1){
							var parsedData = JSON.parse(data);
						//alert(parsedData.list.length);
							$('#stops').empty();
							$('#stops').append("<option>select</option>");
							for(i=0; i < parsedData.list.length; i++) {
								//console.log(parsedData.list);
							$('#stops').append("<option value="+parsedData.list[i].v_s_id+">"+parsedData.list[i].stop_name+"</option>");                      
                    
								
							 
							}
						}
						
   					}
           });
	   }
}
</script>

