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
            <h2> Log In </h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-off-3">
                        <?php echo form_open('dashboard/authentication/signin', array("class" => "form-horizontal")); ?>
                        <fieldset>
                            <h3 style="text-align:center;color:#FF0000;"></h3> 
                            <input class="form-control" type="text" name="email" value="<?php echo $this->input->post('email'); ?>"  placeholder="Email Address">
                            <input class="form-control" type="password" name="password" value="" placeholder="Password">
                        </fieldset>

                        <input type="submit" value="Log In" />
                        <?php echo form_close(); ?> 
                        <div class="utilities">
                            <a href="">Forgot Password?</a>
                            <a href="<?php echo site_url() ?>/dashboard/authentication/signup">Sign Up &rarr;</a>
                        </div>
                    </div>
                </div>
                <div style="width:300px">
                    <ul class="list-group">
                        <?php echo validation_errors(); ?>
                    </ul>
                    <?php if (isset($message)) { ?>
                        <div style="color:#ff9900"><?php echo $message; ?></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>
