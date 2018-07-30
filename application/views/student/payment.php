<style>
.wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 33.33%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
</style>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Student Payment  
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Student Payment </li>
      </ol>
    </section>

    <!-- Main content -->
	<section class="content ">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary" style="padding:20px;">
					<div class="wizard">
            <h1>Student Payment</h1>
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-credit-card"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                    </li>

                    
                </ul>
            </div>
			<?php //echo '<pre>';print_r($student_details);exit; ?>

                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        
						<div class=" col-md-6">
						<h3>Details</h3>
                        <table class="table table-bordered">
							
							<tbody>
							  <tr>
								<th>Name</th>
								<td><?php echo isset($student_details['name'])?$student_details['name']:''; ?></td>
							  </tr>
							  <tr>
								<th>Class</th>
								<td><?php echo isset($student_details['classname'])?$student_details['classname']:''; ?>&nbsp;&nbsp;<?php echo isset($student_details['section'])?$student_details['section']:''; ?></td>
							  </tr>
							  <tr>
								<th>Partent Name</th>
								<td><?php echo isset($student_details['parent_name'])?$student_details['parent_name']:''; ?></td>
							  </tr>
							  <tr>
								<th>Address</th>
								<td>
								<?php echo isset($student_details['address'])?$student_details['address'].',':''; ?>
								<?php echo isset($student_details['current_city'])?$student_details['current_city'].',':''; ?>
								<?php echo isset($student_details['current_state'])?$student_details['current_state'].',':''; ?>
								<?php echo isset($student_details['current_country'])?$student_details['current_country'].',':''; ?>
								<?php echo isset($student_details['current_pincode'])?$student_details['current_pincode'].'.':''; ?>
								</td>
							  </tr>
							 
							</tbody>
						  </table>
						  </div>
						  <div class=" col-md-6">
						<h3>Payment</h3>
						<div class="table-responsive">
                        <table class="table table-bordered">
							
							<tbody>
							  <tr>
								<th>Month</th>
								<th>Fee (Rs) </th>
								<th>pay(Rs)</th>
								<th>Due (Rs)</th>
								
							  </tr>
							  <?php 
							  $total_pay='';
							  if(isset($last_payment_details) && count($last_payment_details)>0){ ?>
							  <?php foreach($last_payment_details as $list){ ?>
							  <tr>
								<td><?php echo date('d-M-Y',strtotime(htmlentities($list['create_at'])));?></td>
								<td><?php echo $list['fee_amount']; ?></td>
								<td><?php echo $list['pay_amount']; ?></td>
								<td><?php echo (($list['fee_amount'])-($list['pay_amount'])); ?></td>
							  </tr>
							  <?php $total_pay +=$list['pay_amount']; ?>
							<?php } ?>
												  
							  <?php } ?>							  
							  
							 <tr>							
								<th>Toatl</th>
								<th><?php echo isset($last_payment_details[0]['fee_amount'])?$last_payment_details[0]['fee_amount']:''; ?></th>
								<th><?php echo isset($total_pay)?$total_pay:''; ?></th>
								<th><?php echo isset($last_payment_details[0]['fee_amount'])?$last_payment_details[0]['fee_amount']-$total_pay:''; ?></th>
								
							  </tr>	
							  
							 
							</tbody>
						  </table>
						    <form action="<?php echo base_url('payment/pay'); ?>" method="post">
							<div class="form-group col-md-12">
								<label class=" control-label"><h3>Enter your present pay Amount</h3></label>
								<div class="col-md-6">
									<input type="hidden"  name="u_id" id="u_id"  value="<?php echo isset($student_details['u_id'])?$student_details['u_id']:''; ?>">
									<input type="text" class="form-control" name="amount" id="amount" placeholder="Enter amount here" value="<?php echo isset($last_payment_details[0]['fee_amount'])?$last_payment_details[0]['fee_amount']-$total_pay:''; ?>">
								
								</div>
								<div class="col-md-6">
									<select name="payment_type" id="payment_type" class="form-control">
									<option value="">Select</option>
									<option value="1">Online</option>
									<option value="2">Cash mode</option>
									
									</select>
								</div>
								<div class="form-group col-md-12" style="padding-top:10px;">
									<input type="text" required class="form-control" name="description" id="description" placeholder="Enter Description" value="">
								</div>
								
							</div>
							<div class="list-inline pull-right">
								<button type="submit" class="btn btn-primary next-step">Pay</button>
							</div>
						  </form>
						  </div>
						  </div>
						
                    </div>
                    
                  
                  
                    <div class="clearfix"></div>
                </div>
            
        </div>
				</div>
			</div>
		</div>
	</section>
 </div>
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
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

</script>