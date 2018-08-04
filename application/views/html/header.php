<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Schools Mangement</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114861070-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-114861070-2');
</script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
   <link href="<?php echo base_url(); ?>assets/vendor/dist/css/bootstrapValidator.min.css" rel="stylesheet">
   
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/datatables/dataTables.bootstrap.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor//plugins/datepicker/datepicker3.css">
  <!-- Theme style -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/dist/css/AdminLTE.min.css">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/dist/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/dist/css/custom.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/select2/select2.min.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/vendor/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>


<script src="<?php echo base_url(); ?>assets/vendor/dist/js/bootstrapValidator.min.js"></script>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>A</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Schools</b>Adimn</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- Notifications: style can be found in dropdown.less -->
		  <?php if(isset($notification_list) && count($notification_list)>0){   ?>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" id="notification_count"><?php if(isset($notification_list) && count($notification_list)>0){   if($notification_count['count']!=0){ echo $notification_count['count']; } } ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo count($notification_list); ?> notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
					<?php $cnt=1;foreach($notification_list as $lis){ ?>
					  <?php if($cnt<=5){ ?>
						  <li >
						  <?php if($userdetails['role_id']==2 && $userdetails['role_id']!=1){ ?>
							<a onclick="opennotification(<?php echo $lis['int_id']; ?>);" data-toggle="modal" data-target="#exampleModalLong">
							  <i class="fa fa-users text-aqua"></i><?php echo $lis['comment']; ?>
							</a>
						  <?php }else if($userdetails['role_id']!=2 && $userdetails['role_id']!=1){ ?>
							<a onclick="resourceopennotification(<?php echo $lis['int_id']; ?>);" data-toggle="modal" data-target="#exampleModalLong">
							  <i class="fa fa-users text-aqua"></i><?php echo $lis['comment']; ?>
							</a>
						  <?php } ?>
						  </li> 
					  <?php } ?>
					<?php $cnt++;} ?>
				
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url('announcement/viewall'); ?>">View all</a></li>
            </ul>
          </li>
		  <?php } ?>
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			<?php if($userdetails['profile_pic']!=''){?>
						<img src="<?php echo base_url('assets/adminpic/'.$userdetails['profile_pic']);?>" class="user-image" alt="<?php echo htmlentities($userdetails['profile_pic']); ?>" />
					<?php }else{ ?>
						<img src="<?php echo base_url();?>assets/vendor/dp.png" class="user-image" alt="User Image" />
					<?php } ?>
              <span class="hidden-xs"><?php echo isset($userdetails['name'])?$userdetails['name']:''; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
			  		<?php if($userdetails['profile_pic']!=''){?>
						<img src="<?php echo base_url('assets/adminpic/'.$userdetails['profile_pic']);?>" class="img-circle" alt="<?php echo htmlentities($userdetails['profile_pic']); ?>" />
					<?php }else{ ?>
						<img src="<?php echo base_url();?>assets/vendor/dp.png" class="img-circle" alt="User Image" />
					<?php } ?>

                <p>
                 <?php echo isset($userdetails['name'])?$userdetails['name']:''; ?>
                  <small><?php echo isset($userdetails['role_name'])?$userdetails['role_name']:''; ?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('profile'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('dashboard/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel bg-profile">
        <div class="pull-left image">
			<?php if($userdetails['profile_pic']!=''){?>
						<img src="<?php echo base_url('assets/adminpic/'.$userdetails['profile_pic']);?>" class="img-circle" alt="<?php echo htmlentities($userdetails['profile_pic']); ?>" />
					<?php }else{ ?>
						<img src="<?php echo base_url();?>assets/vendor/dp.png" class="img-circle" alt="User Image" />
					<?php } ?>        </div>
        <div class="pull-left info">
          <p><?php echo isset($userdetails['name'])?$userdetails['name']:''; ?></p>
          <a href="<?php echo base_url('profile'); ?>"><i class="fa fa-circle text-success"></i> <?php echo isset($userdetails['role_name'])?$userdetails['role_name']:''; ?></a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li> 
		<?php if($userdetails['role_id']==1){?>
				<li class="treeview">
				  <a href="#">
					<i class="fa fa-university"></i> <span>School</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu" style="display: none;">
					<li>
					  <a href="<?php echo base_url('school/add'); ?>">Add</a>
					</li>
					<li><a href="<?php echo base_url('school'); ?>">list</a></li>
				  </ul>
				</li>
                <li class="treeview">
          <a href="<?php echo base_url('announcement/add'); ?>">
            <i class="glyphicon glyphicon-comment"></i> <span>Announcement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li> 
				
        <?php }else if($userdetails['role_id']==2){ ?>
			<li class="treeview">
				  <a href="#">
					<i class="fa fa-university"></i> <span>School </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu" style="display: none;">
					<li>
					  <a href="<?php echo base_url('school/edit'); ?>">Details</a>
					  <a href="<?php echo base_url('resource'); ?>">Add Resource</a>
					</li>
				  </ul>
			</li>
			 <li class="treeview">
          <a href="<?php echo base_url('announcement/schoolannouncement'); ?>">
            <i class="glyphicon glyphicon-comment"></i> <span>Announcement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li> 
			
			
			
		<?php } else if($userdetails['role_id']==3){ ?>
			<li class="treeview">
				  <a href="<?php echo base_url('student'); ?>">
					<i class="fa fa-user"></i> <span>Students </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('school/class_lists'); ?>">
					<i class="fa fa-user"></i> <span>Class List </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('classwise/subjects'); ?>">
					<i class="fa fa-user"></i> <span>Class Subjects </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('school/class-times'); ?>">
					<i class="fa fa-user"></i> <span>Class Times </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('school/class_teachers'); ?>">
					<i class="fa fa-user"></i> <span>Class Teachers </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('classwise/timetable'); ?>">
					<i class="fa fa-user"></i> <span>Assign time slot to Teacher </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<?php }else if($userdetails['role_id']==5){ ?>
		
			<li class="treeview">
				  <a href="<?php echo base_url('transportation/add_routes_stops'); ?>">
					<i class="fa fa-user"></i> <span>Add Routes and Stops</span>
					
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('transportation/vehicle_details'); ?>">
					<i class="fa fa-user"></i> <span>Vehicle Details</span>
					
				  </a>
			</li>	
			<li class="treeview">
				  <a href="<?php echo base_url('transportation/transport_fee_details'); ?>">
					<i class="fa fa-user"></i> <span>Transport Fee Details</span>
					
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('transportation/student_transport_registration'); ?>">
					<i class="fa fa-user"></i> <span>Student Transport Registration</span>
					
				  </a>
			</li>
			
		<?php }else if($userdetails['role_id']==6){ ?>
			
			<li class="treeview">
				  <a href="<?php echo base_url('student/lists'); ?>">
					<i class="fa fa-user"></i> <span>Students list </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('student/attendence'); ?>">
					<i class="fa fa-user"></i> <span>Add Attendence  </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
		<?php }else if($userdetails['role_id']==8){ ?>
			
			<li class="treeview">
				  <a href="<?php echo base_url('student'); ?>">
					<i class="fa fa-user"></i> <span>Total student list </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('academic_mangement/attendance'); ?>">
					<i class="fa fa-user"></i> <span>Attendence Report</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('examination/viewmarks'); ?>">
					<i class="fa fa-user"></i> <span>View Marks  </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
		<?php }else if($userdetails['role_id']==9){ ?>
		<li class="treeview">
				  <a href="<?php echo base_url('examination/create'); ?>">
					<i class="fa fa-user"></i> <span>Create Exam</span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('examination/marks'); ?>">
					<i class="fa fa-user"></i> <span>Add Marks  </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('examination/viewmarks'); ?>">
					<i class="fa fa-user"></i> <span>View Marks  </span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
			</li>
			<?php }else if($userdetails['role_id']==10){ ?>
			<li class="treeview">
				  <a href="<?php echo base_url('librarian/add_book'); ?>">
					<i class="fa fa-plus-square"></i> <span>Add Book</span>
					
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('librarian/issue_book'); ?>">
					<i class="fa fa-book"></i> <span>Issue Book</span>
					
				  </a>
			</li>
			<li class="treeview">
				  <a href="<?php echo base_url('librarian/issue_book_list'); ?>">
					<i class="fa fa-retweet"></i> <span>Renew / Return Book</span>
					
				  </a>
			</li>
		
			<li class="treeview">
				  <a href="<?php echo base_url('librarian/book_damage'); ?>">
					<i class="fa fa-recycle"></i> <span>Book Damage/Book Lost</span>
					
				  </a>
			</li>
			
		<?php } ?>		
		<li class="treeview">
          <a href="<?php echo base_url('dashboard/logout'); ?>">
            <i class="fa fa-user"></i> <span>Logout</span>
            <span class="pull-right-container">
             
            </span>
          </a>
        </li>
    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <!--view modals-->
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
  <!--notification -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Notifications at <span class="" id="notification_time"></span ></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="notification_msg"> </p>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<?php if($this->session->flashdata('success')): ?>
<div class="alert_msg1 animated slideInUp bg-succ">
   <?php echo $this->session->flashdata('success');?> &nbsp; <i class="fa fa-check text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<?php if($this->session->flashdata('error')): ?>
<div class="alert_msg1 animated slideInUp bg-warn">
   <?php echo $this->session->flashdata('error');?> &nbsp; <i class="fa fa-exclamation-triangle text-success ico_bac" aria-hidden="true"></i>
</div>
<?php endif; ?>
<script>
   function opennotification(id){
	   if(id !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('announcement/get_notification_msg');?>",
   			data: {
				notification_id: id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
					$('#notification_count1').empty();
   					$('#notification_count').empty();
   					$('#notification_time').empty();
   					$('#notification_msg').empty();
   					$('#notification_time').empty();
   					var parsedData = JSON.parse(data);
   					$('#notification_msg').append(parsedData.names_list);
   					$('#notification_time').append(parsedData.time);
   					$('#notification_count1').append(parsedData.Unread_count);
   					$('#notification_count').append(parsedData.Unread_count);
						if(parsedData.Unread_count==''){
							$('#count_symbole').hide();
						}else{
							$('#count_symbole').show();
						}
   					}
           });
	   }
	}
	 function resourceopennotification(id){
	   if(id !=''){
		    jQuery.ajax({
   			url: "<?php echo base_url('announcement/get_resource_notification_msg');?>",
   			data: {
				notification_id: id,
			},
   			type: "POST",
   			format:"Json",
   					success:function(data){
						
					$('#notification_count1').empty();
   					$('#notification_count').empty();
   					$('#notification_msg').empty();
   					$('#notification_time').empty();
   					var parsedData = JSON.parse(data);
					//alert(parsedData.names_list);
   					$('#notification_msg').append(parsedData.names_list);
   					$('#notification_time').append(parsedData.time);
   					$('#notification_count1').append(parsedData.Unread_count);
   					$('#notification_count').append(parsedData.Unread_count);
   					}
           });
	   }
	}
   </script>