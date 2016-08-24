<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title> Dashboard Login </title
        <link type="text/css" rel="stylesheet" href="<?php echo site_url() ?>/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/auth/login_css/login_style.css">
    </head>

    <body>

        <div class="login">
            <h2>  Register Form </h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-off-3">

                        <?php echo form_open('dashboard/authentication/register', array("class" => "form-horizontal")); ?>

                        <fieldset>
                            <h3 style="text-align:center;color:#FF0000;"></h3> 
                            <input class="form-control" type="text" name="name" value="<?php echo $this->input->post('name'); ?>"  placeholder="Full Name">
                            <input class="form-control" type="email" name="email" value="<?php echo $this->input->post('email'); ?>" placeholder="Email Address">
                            <input class="form-control" type="password" name="password" value="<?php echo $this->input->post('password'); ?>"  placeholder="Password">
                            <input class="form-control" type="password" name="rpassword" value="" placeholder="Re-type password">
                            <input class="form-control" type="text" name="remark" value="<?php echo $this->input->post('remark'); ?>"  placeholder="Tell us about yourself">
                        </fieldset>

                        <input type="submit" value="Sign Up" />

                        <?php echo form_close(); ?> 
                        <div class="utilities">
                            <a href="<?php echo site_url() ?>dashboard/authentication/forgot">Forgot Password?</a>
                            <a href="<?php echo site_url() ?>dashboard/authentication/login">Login &rarr;</a>
                        </div>
                    </div>
                    <div style="width:300px">
                        <ul class="list-group">
                        <?php echo validation_errors(); ?>
                        </ul>
                        
                    </div>
                            
                </div>
            </div>
        </div>

    </body>
</html>
