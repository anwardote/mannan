<?php
$this->load->view('header');
?>

<link rel="stylesheet" href="../../../website/src/css/bootstrap.min.css"/>
<div id="add_st_myform">
<h3>Registration Form</h3>
<?php
if(isset($result)) echo $result;
?>




<?php echo form_open('Add_student/index'); ?>
<div class="form-group">
<label for="st_roll">Roll No</label>
<input type="text" id="st_roll" class="form-control" name="st_roll" value="<?php echo set_value('st_roll'); ?>" />
<?php echo form_error('st_roll')?>
</div>


<div class="form-group">
<label for="st_name">Student Name </label>
<input type="text" id="st_name" class="form-control" name="st_name" value="<?php echo set_value('st_name'); ?>" />
<?php echo form_error('st_name')?>
</div>


<div class="form-group">
<label for="fa_name">Father's Name</label>
<input type="text" id="fa_name" class="form-control" name="fa_name" value="<?php echo set_value('fa_name'); ?>" />
<?php echo form_error('fa_name')?>
</div>


<div class="form-group">
<label for="mo_name">Mother's Name</label>
<input type="text" id="mo_name" class="form-control" name="mo_name" value="<?php echo set_value('mo_name'); ?>" />
<?php echo form_error('mo_name')?>
</div>


<div class="form-group">
<label for="dob">Date of Birth</label>
<input type="date" id="dob" class="form-control" name="dob" value="<?php echo set_value('dob'); ?>" />
<?php echo form_error('dob')?>
</div>


<div class="form-group">
<label for="gender">Gender</label>
<label class="checkbox-inline"><input type="radio" name="gender" id="male" value="male" <?php  echo set_radio('gender', 'male'); ?> /> Male</label>  
<label class="checkbox-inline"><input type="radio" name="gender" id="female" value="female"  <?php  echo set_radio('gender', 'female'); ?>/> Female</label> 
<?php echo form_error('gender'); ?>
</div>


<div class="form-group">
<label>Class </label>
<select name="class_id" class="form-control">
<option value="Six" <?php  echo set_select('class_id', 'Six'); ?>>Six</option>
<option value="Seven" <?php  echo set_select('class_id', 'Seven'); ?>>Seven</option>
<option value="Eight" <?php  echo set_select('class_id', 'Eight'); ?>>Eight</option>
<option value="Nine" <?php  echo set_select('class_id', 'Nine'); ?>>Nine</option>
<option value="Ten" <?php  echo set_select('class_id', 'Ten'); ?>>Ten</option>
</select>
<?php echo form_error('class_id'); ?>
</div>


<div class="form-group">
<label>Board </label>
<select name="board_id" class="form-control">
<option value="1" <?php  echo set_select('board_id', '1'); ?>>Dhaka</option>
<option value="2" <?php  echo set_select('board_id', '2'); ?>>Chitgong</option>
<option value="3" <?php  echo set_select('board_id', '3'); ?>>Rajshahi</option>
<option value="4" <?php  echo set_select('board_id', '4'); ?>>Rongpur</option>
<option value="5" <?php  echo set_select('board_id', '5'); ?>>Mymensingh</option>
</select>
<?php echo form_error('board_id'); ?>
</div>


<div class="form-group">
<label>Group </label>
<select name="group_id" class="form-control">
<option value="1" <?php  echo set_select('group_id', '1'); ?>>Science</option>
<option value="2" <?php  echo set_select('group_id', '2'); ?>>Arts</option>
<option value="3" <?php  echo set_select('group_id', '3'); ?>>Commerce</option>
</select>
<?php echo form_error('group_id'); ?>
</div>


<div class="form-group">
<label>Institute Name </label>
<select name="inst_name" class="form-control">
<option value="1" <?php  echo set_select('inst_name', '1', TRUE); ?>>Tangail Sristi Degital</option>
<option value="2" <?php  echo set_select('inst_name', '2'); ?>>Muktagacha College</option>
</select>
<?php echo form_error('inst_name'); ?>
</div>


<div class="form-group">
<label>Status </label>
<select name="status_id" class="form-control">
<option value="1" <?php  echo set_select('status_id', '1', TRUE); ?>>Active</option>
<option value="0" <?php  echo set_select('status_id', '0'); ?>>Inactive</option>
</select>
<?php echo form_error('status_id'); ?>
</div>


<?php echo form_error('message'); ?><br />

<div class="form-group">
<input class="btn btn-primary" type="submit" name="Add_student" class="form-control" value="Submit" />
</div>
<?php echo form_close(); ?>



</div>