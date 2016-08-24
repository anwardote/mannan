<?php
$this->load->view('head');
$this->load->view('left');
?>

<!-- #content -->

<div class="row-fluid">
    <div class="span12">
        <div class="box dark">
            <header>
                <div class="icons"><i class="icon-edit"></i></div>
                <h5>User's Registration</h5>
                <!-- .toolbar -->
                <div class="toolbar">
                    <ul class="nav">

                        <li>
                            <a class="accordion-toggle minimize-box" data-toggle="collapse" href="#div-1">
                                <i class="icon-chevron-up"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.toolbar -->
            </header>

            <div id="div-1" class="accordion-body collapse in body">	
                <div class="pull-right"><a class="btn btn-info" href="<?php echo site_url('dashboard/user/index'); ?>">List</a></div>

                <?php echo form_open_multipart('dashboard/user/add', array("class" => "form-horizontal")); ?>


                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control span6 input-tooltip" id="name" data-placement="bottom" />
                        <span class="help-block text-danger"><?php echo form_error('name') ?></span>
                    </div>
                </div>                


                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control span6 input-tooltip" id="email" data-placement="bottom" />
                        <span class="help-block text-danger"><?php echo form_error('email') ?></span> 
                    </div>
                </div>                 


                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Password</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control span6 input-tooltip" id="password" data-placement="bottom" />
                        <span class="help-block text-danger"><?php echo form_error('password') ?></span> 
                    </div>
                </div>                 


                <div class="form-group">
                    <label for="rpassword" class="col-md-4 control-label">Re-Type Password</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="rpassword" value="<?php echo $this->input->post('rpassword'); ?>" class="form-control span6 input-tooltip" id="rpassword" data-placement="bottom" />
                        <span class="help-block text-danger"><?php echo form_error('rpassword') ?></span>                         
                    </div>
                </div> 


                <div class="form-group">
                    <label class="control-label">Select Rank</label>
                    <div class="controls">
                        <select data-placeholder="Choose a rank.."  name="rank_id" class="form-control span6 input-tooltip" tabindex="2">
                            <option value="">Choose one..</option>
                            <?php
                            foreach ($all_ranks as $rank) {
                                echo '<option value="' . $rank['id'] . '">' . $rank['rank'] . '</option>';
                            }
                            ?>
                        </select>
                        <span class="help-block text-danger"><?php echo form_error('rank_id') ?></span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label">Select Status</label>

                    <div class="controls">
                        <select data-placeholder="Choose one.."  name="status" class="form-control span6 input-tooltip" tabindex="2">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <span class="help-block text-danger"><?php echo form_error('status') ?></span>
                    </div>
                </div>                

                <div class="form-group">
                    <label for="remark" class="col-md-4 control-label">Remark</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="remark" value="<?php echo $this->input->post('remark'); ?>" class="form-control span6 input-tooltip" id="remark" data-placement="bottom" />
                        <span class="help-block text-danger"><?php echo form_error('remark') ?></span>
                    </div>
                </div>          


                <div class="form-group">
                    <label for="thumbnil" class="col-md-4 control-label">Photograph</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="file" name="thumbnil" value="<?php echo $this->input->post('thumbnil'); ?>" class="form-control span6 input-tooltip" id="thumbnil" data-placement="bottom" />
                        <span class="help-block text-danger"><?php echo form_error('thumbnil') ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <input class="btn btn-primary" type="submit" class="form-control" value="Submit" />
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>

            <?php
            $this->load->view('foot');
            ?>


