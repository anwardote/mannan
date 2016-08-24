<?php
$this->load->view('header');
?>

<link rel="stylesheet" href="../../../website/src/css/bootstrap.min.css"/>
<div id="add_st_myform">
<h2>Registration Form</h2>
<?php
if(isset($message))?>
<h3 style="color:green; font-size:24px; display:inline-block; text-align:center"><?php echo $message;?></h3>


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
<label class="checkbox-inline">
<input type="radio" name="gender" id="male" value="male" <?php  echo set_radio('gender', 'male', TRUE); ?> /> Male</label>  
<label class="checkbox-inline">
<input type="radio" name="gender" id="female" value="female"  <?php  echo set_radio('gender', 'female'); ?>/> Female</label> 
<?php echo form_error('gender'); ?>
</div>

<!-- ################## Class #####################  -->
<div class="form-group">
<label>Class </label>
<select name="class_id" class="form-control">
<option value="404" >Please select</option>
<?php foreach($class as $r){
	$class_code=$r->class_code;
	$class_name=$r->class_name;
	?>
<option value="<?php echo $class_code; ?>" <?php  echo set_select('class_id', $class_code); ?>>
<?php echo $class_name ?></option>
	<?php } ?>
</select>
<?php echo form_error('class_id'); ?>
</div>


<!-- ################## Subject #####################  -->
<div class="form-group">
<label>Subject </label><br>

<?php foreach($subject as $r){
	$subject_code=$r->subject_code;
	$subject_name=$r->subject_name;
	?>

<label><input type="checkbox" name="subject[]" value="<?php echo $subject_code; ?>"
 <?php  echo set_checkbox('subject[]', $subject_code);  ?> /> <?php echo $subject_name ?> </label>
<?php }
echo form_error('subject[]'); ?>



<!-- ################## Board #####################  -->

<div class="form-group">
<label>Board </label>
<select name="board_id" class="form-control">
<option value="404" >Please select</option>
<?php foreach($board as $r){
	echo $board_code=$r->board_code;
	echo $board_name=$r->board_name;
	?>
<option value="<?php echo $board_code; ?>" <?php  echo set_select('board_id', $board_code); ?>>
<?php echo $board_name ?></option>
	<?php } ?>
</select>
<?php echo form_error('board_id'); ?>
</div>



<!-- ################## Group #####################  -->

<div class="form-group">
<label>Group </label>
<select name="group_id" class="form-control">
<option value="404" >Please select</option>
<?php foreach($group as $r){
	echo $group_code=$r->group_code;
	echo $group_name=$r->group_name;
	?>
<option value="<?php echo $group_code; ?>" <?php  echo set_select('group_id', $group_code); ?>>
<?php echo $group_name ?></option>
	<?php } ?>
</select>
<?php echo form_error('group_id'); ?>
</div>


<!-- ################## Institute Name #####################  -->

<div class="form-group">
<label>Institute Name </label>
<select name="inst_name" class="form-control">
<option value="404" >Please select</option>
<?php foreach($institute as $r){
	echo $institute_code=$r->institute_code;
	echo $institute_name=$r->institute_name;
	?>
<option value="<?php echo $institute_code; ?>" <?php  echo set_select('inst_name', $institute_code); ?>>
<?php echo $institute_name ?></option>
	<?php } ?>
</select>
<?php echo form_error('inst_name'); ?>
</div>


<!-- ################## Status Name #####################  -->
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