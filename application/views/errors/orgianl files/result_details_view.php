
<link rel="stylesheet" href="../../../website/src/css/bootstrap.min.css"/>
<div id="add_st_myform">

<?php
//if(isset($message))?>
<!--h3 style="color:green; font-size:24px; display:inline-block; text-align:center"><?php //echo $message;?></h3-->


<?php echo form_open('Result/Submit_Result'); 
//print_r($exam_info);
?>

<div class="row panel-heading">
<h3>Student Details</h3>
<div class="col-sm-6">

<span class="detailtitle">St. Name :</span>
<span class="detailinfo"><?php echo $student_name; ?></span><br>

<span class="detailtitle">Class :</span>
<span class="detailinfo"><?php foreach($class_name as $r){
	echo $r->class_name;
	} ?></span><br>
    
<!-- ################## Group #####################  -->    
<span class="detailtitle">Group :</span>
<span class="detailinfo"><?php foreach($group_name as $r){
	echo $r->group_name;
	} ?></span><br>
        
    
    
    
</div>
<div class="col-sm-6">

<!-- ################## Board #####################  -->    
<span class="detailtitle">Board :</span>
<span class="detailinfo"><?php 
foreach($board_name as $r){
	echo $r->board_name;
	}
	?></span><br>
    
    
<!-- ################## Institute #####################  -->    
<span class="detailtitle">Institute :</span>
<span class="detailinfo"><?php 
foreach($institute_name as $r){
	echo $r->institute_name;
	}
	?></span><br> 
    
    
<!-- ################## Subject #####################  -->    
<span class="detailtitle">Subject :</span>
<span class="detailinfo"><?php 
foreach($subject as $k=>$v){
	echo $v;
	echo ", ";
	}
	?></span><br>        

</div>
</div>
<hr>
<div class="row">
<div class="col-sm-6">
<!-- ################## Year #####################  -->
<div class="form-group">
<label for="st_roll">Roll No.</label>
<input type="text" id="st_roll" class="form-control" name="st_roll" value="<?php echo $student_roll; ?>" readonly />
<?php echo form_error('st_roll')?>
</div>

<div class="form-group">
<label>Year </label>
<select name="year_id" class="form-control">
<option value="2016" <?php  echo set_select('year_id', '2016', TRUE); ?>>2016</option>
<option value="2017" <?php  echo set_select('year_id', '2017'); ?>>2017</option>
<option value="2018" <?php  echo set_select('year_id', '2018'); ?>>2018</option>
<option value="2019" <?php  echo set_select('year_id', '2019'); ?>>2019</option>
<option value="2020" <?php  echo set_select('year_id', '2020'); ?>>2020</option>
</select>
<?php echo form_error('status_id'); ?>
</div>


<!-- ################## Full Marks #####################  -->
<div class="form-group">
<label for="full_marks">Full Marks</label>
<input type="number" size="3" id="full_marks" class="form-control" name="full_marks" value="<?php echo set_value('full_marks'); ?>" />
<?php echo form_error('full_marks')?>
</div>

<!-- ################## Obtain Marks #####################  -->
<div class="form-group">
<label for="ob_marks">Obtain Marks</label>
<input type="number" size="3" id="ob_marks" class="form-control" name="ob_marks" value="<?php echo set_value('ob_marks'); ?>" />
<?php echo form_error('ob_marks')?>
</div>


</div>

<div class="col-sm-6">

<!-- ################## Exam #####################  -->
<div class="form-group">
<label>Exam </label>
<select name="exam_id" class="form-control">
<?php foreach($exam_info as $r){
	$exam_code=$r->exam_code;
	$exam_name=$r->exam_name;
	?>
<option value="<?php echo $exam_code; ?>" <?php  echo set_select('exam_id', $exam_code); ?>>
<?php echo $exam_name ?></option>
	<?php } ?>
</select>
<?php echo form_error('exam_id'); ?>
</div>

<!-- ################## Subject #####################  -->
<div class="form-group">
<label>Subject </label>
<select name="subject_id" class="form-control">
<?php 
foreach($subject as $k=>$v){
	$sub_code=$k;
	$sub_name=$v;
	?>
<option value="<?php echo $sub_code; ?>" <?php  echo set_select('subject_id', $sub_code); ?>>
<?php echo $sub_name ?></option>
	<?php } ?>
</select>
<?php echo form_error('subject_id'); ?>
</div>

<!-- ################## Pass Marks #####################  -->
<div class="form-group">
<label for="pass_marks">Pass Marks</label>
<input type="number" size="3" id="pass_marks" class="form-control" name="pass_marks" value="<?php echo set_value('pass_marks'); ?>" />
<?php echo form_error('pass_markssssss')?>
</div>

</div>
</div>



<?php echo form_error('message'); ?><br />

<div class="form-group">
<input class="btn btn-primary" type="submit" name="Add_result" class="form-control" value="Add Result" />
</div>
<?php echo form_close(); ?>



</div>