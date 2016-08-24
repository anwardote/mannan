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
                <h5>Trip Categories Editor</h5>
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
                <div class="pull-right"><a class="btn btn-info" href="<?php echo site_url('dashboard/tcategory/index'); ?>">List</a><a class="btn btn-info" href="<?php echo site_url('dashboard/user/add'); ?>">New</a></div>

                <?php echo form_open_multipart('dashboard/tcategory/edit/' . $tcategory['id'], array("class" => "form-horizontal")); ?>

                <div class="form-group">
                    <label for="title" class="col-md-4 control-label">Title</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="title" value="<?php echo ($this->input->post('title') ? $this->input->post('title') : $tcategory['title']); ?>" class="form-control span6 input-tooltip" id="title" />
                        <span class="help-block text-danger"><?php echo form_error('title') ?></span> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">Description</label>
                    <div class="col-md-8 controls with-tooltip">
                        <textarea class="form-control span6 input-tooltip" name="description"><?php echo ($this->input->post('description') ? $this->input->post('description') : $tcategory['description']); ?></textarea>
                        <span class="help-block text-danger"><?php echo form_error('description') ?></span> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="Remark" class="col-md-4 control-label">Remark</label>
                    <div class="col-md-8 controls with-tooltip">
                        <textarea class="form-control span6 input-tooltip" name="remark"><?php echo ($this->input->post('remark') ? $this->input->post('remark') : $tcategory['remark']); ?></textarea>
                        <span class="help-block text-danger"><?php echo form_error('remark') ?></span> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="thumbnil" class="col-md-4 control-label">Thumbnil</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="file" name="thumbnil" value="<?php echo ($this->input->post('thumbnil') ? $this->input->post('thumbnil') : $tcategory['thumbnil']); ?>" class="form-control span6 input-tooltip" id="thumbnil" />
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
