<div class="modal fade" id="myModal_add" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Capital Addition/Deduction Form</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" id="bank_capital_form" style="margin:12px; display: none" >
                    <div class="form-group">
                        <label for="t_type" class="col-md-4 control-label">Transaction Type</label>
                        <div class="col-md-8 controls with-tooltip">
                            <select name="t_type" class="form-control  span6 input-tooltip">
                                <option value="">Choose One</option>
                                <?php
                                $t_type_values = array(
                                    '1' => 'Addition',
                                    '0' => 'Deduction',
                                );

                                foreach ($t_type_values as $value => $display_text) {


                                    echo '<option value="' . $value . '">' . $display_text . '</option>';
                                }
                                ?>
                            </select>
                            <span class="help-block text-danger"><?php echo form_error('hidden') ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="amount" class="col-md-4 control-label">Amount</label>
                        <div class="col-md-8 controls with-tooltip">
                            <input type="text" name="amount" value="<?php echo $this->input->post('amount'); ?>" class="form-control span6 input-tooltip" />
                            <span class="help-block text-danger"><?php echo form_error('amount') ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="entry_date" class="col-md-4 control-label">Date</label>
                        <div class="col-md-8 controls with-tooltip">
                            <input type="text" name="entry_date" value="<?php echo $this->input->post('entry_date'); ?>" class="form-control  span6 input-tooltip datepicker" />
                            <span class="help-block text-danger"><?php echo form_error('entry_date') ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="col-md-4 control-label">Description</label>
                        <div class="col-md-8 controls with-tooltip">
                            <input type="text" name="description" value="<?php echo $this->input->post('description'); ?>" class="form-control span6 input-tooltip" />
                            <span class="help-block text-danger"><?php echo form_error('description') ?></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="hidden" class="col-md-4 control-label">Hidden</label>
                        <div class="col-md-8 controls with-tooltip">
                            <select name="hidden" class="form-control  span6 input-tooltip">
                                <option value="">select</option>
                                <?php
                                $hidden_values = array(
                                    '0' => 'No',
                                    '1' => 'Yes',
                                );

                                foreach ($hidden_values as $value => $display_text) {
                                    $selected = "";
                                    if ($value == $this->input->post('hidden'))
                                        $selected = 'selected="selected"';

                                    echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                }
                                ?>
                            </select>
                            <span class="help-block text-danger"><?php echo form_error('hidden') ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comments" class="col-md-4 control-label">Comments</label>
                        <div class="col-md-8 controls with-tooltip">
                            <textarea name="comments" class="form-control  span6 input-tooltip"><?php echo $this->input->post('comments'); ?></textarea>
                            <span class="help-block text-danger"><?php echo form_error('comments') ?></span>
                        </div>
                    </div>

                    <style>
                        .btn-submit {width:25px; height: 25px}

                    </style>
                    <div class="form-group">
                        <label class="col-md-4 control-label"></label>
                        <div class="col-md-8 controls with-tooltip">
                            <a href="#" class="btn btn-success btn-submit" id="SubmitBtn" title="Submit Form"><img style="width: 25px" height="25px" src="<?php echo site_url(); ?>assets/uploads/icons/plus.png"></a>
                            <a href="#" class="btn btn-info btn-submit" title="Clear Form" id="ClearBtn"><img style="width: 25px" height="25px" src="<?php echo site_url(); ?>assets/uploads/icons/clear.png"></a>


                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">

                <a type="button" class="btn btn-danger btn-submit" data-dismiss="modal"><img style="width: 25px" height="25px" src="<?php echo site_url(); ?>assets/uploads/icons/hidden.png"></a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function (e) {
        $("#NewEntryBtn").click(function (e) {
            e.preventDefault();
            $("#bank_capital_form").trigger('reset');
            $("#bank_capital_form").show('100');
        })

    })
</script>