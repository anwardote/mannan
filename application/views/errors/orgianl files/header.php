<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="<?php echo site_url() ?>/src/css/bootstrap.min.css"/>
<link rel="stylesheet" href="<?php echo site_url() ?>/src/css/style.css"/>
</head>

<body>
<div class="container">
<?php
echo anchor('home', 'Go Home', array('class'=>"btn btn-success"));
echo anchor('account/dashboard', 'Account', array('class'=>"btn btn-success"));

?>
<hr>