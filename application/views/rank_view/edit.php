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
                <h5>User's Rank Update</h5>
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
                <div class="pull-right"><a class="btn btn-info" href="<?php echo site_url('dashboard/rank/index'); ?>">List</a><a class="btn btn-info" href="<?php echo site_url('dashboard/rank/add'); ?>">New</a></div>

                <?php echo form_open('dashboard/rank/edit/' . $rank['id'], array("class" => "form-horizontal")); ?>

                <div class="form-group">
                    <label for="rank" class="col-md-4 control-label">Rank Title</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="rank" value="<?php echo ($this->input->post('rank') ? $this->rank->post('rank') : $rank['rank']); ?>" class="form-control span6 input-tooltip" id="rank" />
                        <span class="help-block text-danger"><?php echo form_error('rank') ?></span> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">Rank Description</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->rank->post('description') : $rank['description']); ?>" class="form-control span6 input-tooltip" id="description" />
                        <span class="help-block text-danger"><?php echo form_error('description') ?></span> 
                    </div>
                </div>



                <div class="form-group">
                    <label for="permission" class="col-md-4 control-label">Rank Permission</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="permission" value="<?php echo ($this->input->post('permission') ? $this->rank->post('permission') : $rank['permission']); ?>" class="form-control span6 input-tooltip" id="permission" />
                        <span class="help-block text-danger"><?php echo form_error('permission') ?></span> 
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
