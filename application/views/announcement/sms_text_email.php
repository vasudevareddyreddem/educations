
<div class="content-wrapper">
    <section class="content-header">
        <h1>SMS Text & Email</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">SMS Text & Email</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">SMS Text & Email to Student</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div style="padding:20px;">
                        <form id="" method="post" class="" action="">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class=" control-label">SMS / Email</label>
                                    <div class="">
                                        <select id="" name="" class="form-control">
                                            <option value="">xxxx</option>
                                            <option value="">xxxx</option>
                                            <option value="">xxxx</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class=" control-label"> Student / Staff</label>
                                    <div class="">
                                        <select id="" name="" class="form-control">
                                            <option value="">xxxx</option>
                                            <option value="">xxxx</option>
                                            <option value="">xxxx</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class=" control-label"> Send SMS to Students</label>
                                    <div class="">
                                        <select id="" name="" class="form-control">
                                            <option value="">xxxx</option>
                                            <option value="">xxxx</option>
                                            <option value="">xxxx</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-info" id="showTextarea">Text</button>
                                 &nbsp;&nbsp;
                                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#smsTemplate" name="" value="">SMS Template</button>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                            <div class="col-md-12" id="message">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class=" control-label">Type Message</label>
                                            <div class="">
                                                <textarea class="form-control" id="" rows="7" placeholder="Enter Message Here"></textarea>
                                                <br>
                                            </div>
                                            <div class="text-right">
                                                <button class="btn btn-secoundary text-right" name="" value="">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                        </form>
                        
                        <div class="clearfix">&nbsp;</div>

                        <div class="box">
                            <div class="box-header">
                                <h3 class="">List of Slots for All Teachers</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Select All / None</th>
                                            <th class="text-center">Student Name</th>
                                            <th class="text-center">Roll No</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="" id=""/>
                                            </td>
                                            <td>xxxxx</td>
                                            <td>xxxxx</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="" id=""/>
                                            </td>
                                            <td>xxxxx</td>
                                            <td>xxxxx</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="" id=""/>
                                            </td>
                                            <td>xxxxx</td>
                                            <td>xxxxx</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!--/.col (right) -->
    </section>
</div>

<div class="modal fade in" id="smsTemplate" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="padding:10px">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 style="pull-left" class="modal-title">SMS Template</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="" class="col-xs-12 col-xl-12 form-group">Some Text Here</div>
                    <div class="col-xs-6 col-md-6">
                        <button type="button" aria-label="Close" data-dismiss="modal" class="btn  blueBtn">Cancel</button>
                    </div>
                    <div class="col-xs-6 col-md-6">
                        <a href="" class="btn btn-info" style="text-decoration:none;float:right;"> <span aria-hidden="true">Ok</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function(){
	$("#message").css("display", "none");
    $("#showTextarea").click(function(){
        $("#message").css("display", "block");
    });
});
</script>
