
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Student Hall Ticket</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div style="padding:20px;">
                        <form id="" method="post" class="" action="">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class=" control-label">Class</label>
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
                                    <label class=" control-label"> Section</label>
                                    <div class="">
                                        <select id="" name="" class="form-control">
                                            <option value="">xxxx</option>
                                            <option value="">xxxx</option>
                                            <option value="">xxxx</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-center">
                                <br>
                                <button type="button" id="showHallticket" class="btn btn-primary" name="" value="">Generate Hall Ticket</button>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                        </form>

                        <br><hr>
                        
                        <div class="" id="HTFormat">
                            <h2 class="text-center">Student Hall Ticket</h2><br>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Roll Number</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="123456" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Class</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="xxxx" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Section</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="xxxxx" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class=" control-label">Candidate's Name</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="Hello" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class=" control-label">Gender</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="Male" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" control-label">Father's Name</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="Hi" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class=" control-label">Mother's Name</label>
                                            <div class="">
                                                <input class="form-control" name="" id="" value="Hey!" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix">&nbsp;</div>

                            <div class="" style="padding:20px;">
                                <div class="table-responsive">
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Subject</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Time</th>
                                                <th class="text-center">Invigilator Sign</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td>xxxxx</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <p>NOTE :</p>
                                <ol type="1">
                                    <li>These are the rules you have to follow in the examination strictly</li>
                                    <li>These are the rules you have to follow in the examination strictly</li>
                                    <li>These are the rules you have to follow in the examination strictly</li>
                                </ol>
                            </div>
                            
                            <div class="col-md-4 pull-right">
                                <div class="form-group">
                                    <label class="text-center control-label">Principal Signature</label>
                                    <div class="">
                                        <input class="form-control" name="" id="" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">&nbsp;</div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!--/.col (right) -->
    </section>
</div>


<script>
$(document).ready(function(){
	$("#HTFormat").css("display", "none");
    $("#showHallticket").click(function(){
        $("#HTFormat").css("display", "block");
    });
});
</script>

