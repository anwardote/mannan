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
                <h5>Picture Post Entry</h5>
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
                <div class="pull-right"><a class="btn btn-info" href="<?php echo site_url('dashboard/picture/index'); ?>">List</a></div>

                <?php echo form_open_multipart('dashboard/picture/add', array("class" => "form-horizontal")); ?>

                <div class="form-group">
                    <label for="title" class="col-md-4 control-label">Title</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="title" value="<?php echo $this->input->post('title'); ?>" class="form-control span6 input-tooltip" id="title" />
                        <span class="help-block text-danger"><?php echo form_error('title') ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="pcategorie_id" class="col-md-4 control-label">Picture Category</label>
                    <div class="col-md-8 controls with-tooltip">
                        <select name="pcategorie_id" class="form-control span6 input-tooltip">
                            <option value="">Choose one...</option>
                            <?php
                            $Cstatus = ($this->input->post('pcategorie_id') ? $this->input->post('pcategorie_id') : "");
                            echo $Cstatus;
                            //exit();
                            print_r($Cstatus);
                            foreach ($all_pcategories as $pcategory) {
                                if ($Cstatus == $pcategory['id']) {
                                    echo '<option value="' . $pcategory['id'] . '" selected="selected">' . $pcategory['title'] . '</option>';
                                } else {
                                    echo '<option value="' . $pcategory['id'] . '">' . $pcategory['title'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                        <span class="help-block text-danger"><?php echo form_error('pcategorie_id') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="found_at" class="col-md-4 control-label">Found At</label>
                    <div class="col-md-8 controls with-tooltip">
                        <textarea name="found_at" class="form-control span6 input-tooltip" id="found_at"><?php echo $this->input->post('found_at'); ?></textarea>
                        <span class="help-block text-danger"><?php echo form_error('found_at') ?></span>
                    </div>
                </div>                
                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">Description</label>
                    <div class="col-md-8 controls with-tooltip">
                        <textarea  name="description" class="tinymce form-control span6 input-tooltip" id="description"><?php echo $this->input->post('description'); ?></textarea>
                        <span class="help-block text-danger"><?php echo form_error('description') ?></span>
                    </div>
                </div>



                <div class="form-group">
                    <label for="remark" class="col-md-4 control-label">Remark</label>
                    <div class="col-md-8 controls with-tooltip">
                        <textarea name="remark" class="form-control span6 input-tooltip" id="remark"><?php echo $this->input->post('remark'); ?></textarea>
                        <span class="help-block text-danger"><?php echo form_error('remark') ?></span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="thumbnil" class="col-md-4 control-label">Thumbnil</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="file" name="thumbnil" value="<?php echo $this->input->post('thumbnil'); ?>" class="form-control span6 input-tooltip" id="thumbnil" required="required" />
                        <span class="help-block text-danger"><?php echo form_error('thumbnil') ?></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="is_hidden" class="col-md-4 control-label">Is Hidden</label>
                    <div class="col-md-8 controls with-tooltip">
                        <select name="is_hidden" class="form-control span6 input-tooltip">

                            <?php
                            $Cstatus = ($this->input->post('is_hidden') ? $this->input->post('is_hidden') : "0");
                            if ($Cstatus == 0) {
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
                        <span class="help-block text-danger"><?php echo form_error('is_hidden') ?></span>
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
