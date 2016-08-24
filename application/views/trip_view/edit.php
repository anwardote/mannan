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
                <h5>Trips Post Editor</h5>
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
                <div class="pull-right"><a class="btn btn-info" href="<?php echo site_url('dashboard/trip/index'); ?>">List</a><a class="btn btn-info" href="<?php echo site_url('dashboard/user/add'); ?>">New</a></div>

                <?php echo form_open_multipart('dashboard/trip/edit/' . $trip['id'], array("class" => "form-horizontal")); ?>

                <div class="form-group">
                    <label for="title" class="col-md-4 control-label">Title</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" name="title" value="<?php echo ($this->input->post('title') ? $this->input->post('title') : $trip['title']); ?>" class="form-control span6 input-tooltip" id="title" />
                        <span class="help-block text-danger"><?php echo form_error('title') ?></span> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="tcategorie_id" class="col-md-4 control-label">Trip Category</label>
                    <div class="col-md-8 controls with-tooltip">
                        <select name="tcategorie_id" class="form-control span6 input-tooltip">
                            <option value="">Choose one..</option>
                            <?php
                            foreach ($all_tcategories as $tcategory) {
                                $selected = "";
                                if ($tcategory['id'] == $trip['tcategorie_id'])
                                    $selected = 'selected="selected"';

                                echo "<option value='" . $tcategory['id'] . "' $selected>" . $tcategory['title'] . '</option>';
                            }
                            ?>
                        </select>
                        <span class="help-block text-danger"><?php echo form_error('tcategorie_id') ?></span> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="found_at" class="col-md-4 control-label">Found At</label>
                    <div class="col-md-8 controls with-tooltip">
                        <textarea name="found_at" class="form-control span6 input-tooltip"><?php echo ($this->input->post('found_at') ? $this->input->post('found_at') : $trip['found_at']); ?></textarea>
                        <span class="help-block text-danger"><?php echo form_error('found_at') ?></span> 
                    </div>
                </div>        

                <div class="form-group">
                    <label for="description" class="col-md-4 control-label">Description</label>
                    <div class="col-md-8 controls with-tooltip">
                        <textarea name="description" class="tinymce form-control span6 input-tooltip"><?php echo ($this->input->post('description') ? $this->input->post('description') : $trip['description']); ?></textarea>
                        <span class="help-block text-danger"><?php echo form_error('description') ?></span> 
                    </div>
                </div>



                <div class="form-group">
                    <label for="remark" class="col-md-4 control-label">Remark</label>
                    <div class="col-md-8 controls with-tooltip">
                        <textarea name="remark" class="form-control span6 input-tooltip"><?php echo ($this->input->post('remark') ? $this->input->post('remark') : $trip['remark']); ?></textarea>
                        <span class="help-block text-danger"><?php echo form_error('remark') ?></span> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="thumbnil" class="col-md-4 control-label">Thumbnil</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="file" name="thumbnil" value="<?php echo ($this->input->post('thumbnil') ? $this->input->post('thumbnil') : $trip['thumbnil']); ?>" class="form-control span6 input-tooltip" id="thumbnil" />
                        <span class="help-block text-danger"><?php echo form_error('thumbnil') ?></span> 
                    </div>
                </div>


                <div class="form-group">
                    <label for="is_hidden" class="col-md-4 control-label">Is Hidden</label>
                    <div class="col-md-8 controls with-tooltip">
                        <select name="is_hidden" class="form-control span6 input-tooltip">
                            <?php
                            $Cstatus = ($this->input->post('is_hidden') ? $this->input->post('is_hidden') : $trip['is_hidden']);
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
                    <label for="created_by" class="col-md-4 control-label">Created By</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" value="<?php echo $user['name'] . " (" . $user['email'] . ")"; ?>" class="form-control span6 input-tooltip" id="created_by" readonly="readonly"/>
                        <span class="help-block text-danger"><?php echo form_error('created_by') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="created" class="col-md-4 control-label">Created Time</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" value="<?php
                        $timeStamp = ($this->input->post('created') ? $this->input->post('created') : $trip['created']);
                        echo date('jS F Y h:i:s A (T)', $timeStamp);
                        ?>" class="form-control span6 input-tooltip" id="created" readonly="readonly"/>
                        <span class="help-block text-danger"><?php echo form_error('created') ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="updated" class="col-md-4 control-label">Last Updated Time</label>
                    <div class="col-md-8 controls with-tooltip">
                        <input type="text" value="<?php
                        $datetime = ($this->input->post('updated') ? $this->input->post('updated') : $trip['updated']);
                        $date = new DateTime($datetime);
                        echo $date->format('jS F Y h:i:s A (T)');
                        ?>" class="form-control span6 input-tooltip" id="updated" readonly="readonly" />
                        <span class="help-block text-danger"><?php echo form_error('updated') ?></span>
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