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
                <h5>Update User Info</h5>
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
                <div class="pull-right"><a class="btn btn-info" href="<?php echo site_url('dashboard/user/index'); ?>">List</a><a class="btn btn-info" href="<?php echo site_url('dashboard/user/add'); ?>">New</a></div>

                <?php echo form_open_multipart('dashboard/user/edit/' . $user['id'], array("class" => "form-horizontal")); ?>

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $user['name']); ?>" class="form-control span6 input-tooltip" id="name" />
                        <span class="help-block text-danger"><?php echo form_error('name') ?></span> 
                    </div>
                </div>


                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Email</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" class="form-control span6 input-tooltip" id="email" readonly="readonly" />
                        <span class="help-block text-danger"><?php echo form_error('email') ?></span> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-md-4 control-label">Password</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="password" name="password" value="<?php echo ($this->input->post('password') ? $this->input->post('password') : ""); ?>" class="form-control span6 input-tooltip" id="password" />
                        <span class="help-block text-danger"><?php echo form_error('password') ?></span> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="rpassword" class="col-md-4 control-label">Re-Type Password</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="password" name="rpassword" value="<?php echo $this->input->post('rpassword'); ?>" class="form-control span6 input-tooltip" id="rpassword" data-placement="bottom" />
                        <span class="help-block text-danger"><?php echo form_error('rpassword') ?></span>                         
                    </div>
                </div> 

                <div class="form-group">
                    <label for="rank_id" class="col-md-4 control-label">Rank</label>
                    <div class="col-md-8 controls with-tooltip">
                        <select name="rank_id" class="form-control span6 input-tooltip">
                            <option value="">select rank</option>
                            <?php
                            foreach ($all_ranks as $rank) {
                                $selected = "";
                                if ($rank['id'] == $user['rank_id'])
                                    $selected = 'selected="selected"';

                                echo "<option value='" . $rank['id'] . "' $selected>" . $rank['rank'] . '</option>';
                            }
                            ?>
                        </select>
                        <span class="help-block text-danger"><?php echo form_error('rank_id') ?></span> 
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label">Select Status</label>
                    <div class="controls">
                        <select data-placeholder="Choose a status.."  name="status" class="form-control span6 input-tooltip" tabindex="2">
                            <?php
                            $Cstatus = ($this->input->post('status') ? $this->input->post('status') : "");
                            if ($Cstatus == 0) {
                                ?>
                                <option value="1">Active</option>
                                <option value="0" selected="selected">Inactive</option>
                                <?php
                            } else {
                                ?>
                                <option value="1" selected="selected">Active</option>
                                <option value="0">Inactive</option>
                                <?php
                            }
                            ?>                            

                        </select>
                        <span class="help-block text-danger"><?php echo form_error('status') ?></span>
                    </div>
                </div> 

                <div class="form-group">
                    <label class="control-label">Is Banned</label>
                    <div class="controls">
                        <select data-placeholder="Choose a status.."  name="is_banned" class="form-control span6 input-tooltip" tabindex="2">
                            <?php
                            $Cis_banned = ($this->input->post('is_banned') ? $this->input->post('is_banned') : "");
                            if ($Cis_banned == 0) {
                                ?>
                                <option value="0" selected="selected">No</option>
                                <option value="1">Yes</option>

                                <?php
                            } else {
                                ?>
                                <option value="0">No</option>
                                <option value="1" selected="selected">Yes</option>

                                <?php
                            }
                            ?>                            
                        </select>
                        <span class="help-block text-danger"><?php echo form_error('is_banned') ?></span>
                    </div>
                </div>                 


                <div class="form-group">
                    <label for="remark" class="col-md-4 control-label">Remark</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="remark" value="<?php echo ($this->input->post('remark') ? $this->input->post('remark') : $user['remark']); ?>" class="form-control span6 input-tooltip" id="remark" />
                        <span class="help-block text-danger"><?php echo form_error('remark') ?></span> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="thumbnil" class="col-md-4 control-label">Photo</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="file" name="thumbnil" value="<?php echo ($this->input->post('thumbnil') ? $this->input->post('thumbnil') : $user['thumbnil']); ?>" class="form-control span6 input-tooltip" id="thumbnil" />
                        <span class="help-block text-danger"><?php echo form_error('thumbnil') ?></span> 
                    </div>
                </div>


                <div class="form-group">
                    <label class="control-label"></label>
                    <div class="controls">
                        <input class="btn btn-primary" type="submit" class="form-control" value="Save" />
                    </div>
                </div>


                <?php echo form_close(); ?>

            </div>

            <?php
            $this->load->view('foot');
            ?>


