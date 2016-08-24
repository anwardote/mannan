<?php
$this->load->view('header');
?>

<link rel="stylesheet" href="../../../website/src/css/bootstrap.min.css"/>
<div id="add_st_myform">
<h3>Result Entry</h3>
<?php
if(isset($message))?>
<h3 style="color:green; font-size:24px; display:inline-block; text-align:center"><?php echo $message;?></h3>


<?php echo form_open('Result/index'); ?>
<div class="form-group">
<label for="st_roll">Roll No</label>
<input type="text" id="st_roll" class="form-control" name="st_roll" value="<?php echo set_value('st_roll'); ?>" />
<?php echo form_error('st_roll')?>
</div>

<?php echo form_error('message'); ?><br />

<div class="form-group">
<input class="btn btn-primary" type="submit" name="result_student" class="form-control" value="Load Details" />
</div>
<?php echo form_close(); ?>



</div>