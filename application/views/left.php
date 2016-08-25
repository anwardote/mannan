<!-- BEGIN LEFT  -->
<div id="left">
    <!-- .user-media -->
    <div class="media user-media hidden-phone">
        <a href="" style='width:60px' class="user-link">

            <?php
            $thumb = explode(".", $this->session->userdata('thumbnil'));
            $thumbnil_thumb = $thumb['0'] . "_thumb." . $thumb['1'];
            $userimage = site_url() . "assets/uploads/users/" . $thumbnil_thumb;


            if (@getimagesize($userimage)) {
                $userphoto = $userimage;
                ;
            } else {
                $userphoto = site_url() . "assets/photo/default.png";
            }
            ?>
            <img src="<?php echo $userphoto; ?>" alt="" class="media-object img-polaroid user-img">
        </a>

        <div class="media-body hidden-tablet">
            <h5 class="media-heading"><?php echo $this->session->userdata('name'); ?></h5>
            <ul class="unstyled user-info">
                <li><a href=""><?php echo $this->session->userdata('rank'); ?></a></li>
                <li>Last Activities Time: <br/>
                    <small><i class="icon-calendar"></i> <?php echo date("j F Y") ?></small>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.user-media -->



    <!-- BEGIN MAIN NAVIGATION -->
    <ul id="menu" class="unstyled accordion collapse in">

        <li class="accordion-group ">
            <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#capital-nav">
                <i class="icon-tasks icon-large"></i> Bank Capital <span class="label label-inverse pull-right">4</span>
            </a>
            <ul class="collapse list-group" id="capital-nav">

                <li>
                    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#capital-nav-tab">Bank Capital</a>
                    
                </li>
            </ul>
        </li>



        <li class="accordion-group ">
            <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
                <i class="icon-tasks icon-large"></i> Categories Setup <span class="label label-inverse pull-right">4</span>
            </a>
            <ul class="collapse list-group" id="component-nav">

                <li><?php echo anchor('dashboard/tcategory/index', "Trip Category List ", array('style' => 'padding-left:30px')) ?></li>
                <li><?php echo anchor('dashboard/tcategory/add', "Add Trip Category", array('style' => 'padding-left:30px')) ?></li>

                <li><?php echo anchor('dashboard/pcategory/index', "Picture Category List ", array('style' => 'padding-left:30px')) ?></li>
                <li><?php echo anchor('dashboard/pcategory/add', "Add NewPicture Category", array('style' => 'padding-left:30px')) ?></li>
            </ul>
        </li>

        <li class="accordion-group ">
            <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#student-nav">
                <i class="icon-globe icon-large"></i> Posts Management<span class="label label-inverse pull-right">4</span>
            </a>
            <ul class="collapse " id="student-nav">
                <li><?php echo anchor('dashboard/picture/index', "Picture Post List ", array('style' => 'padding-left:30px')) ?></li>
                <li><?php echo anchor('dashboard/picture/add', "Add New Picture Post ", array('style' => 'padding-left:30px')) ?></li>
                <li><?php echo anchor('dashboard/trip/index', "Trips List ", array('style' => 'padding-left:30px')) ?></li>
                <li><?php echo anchor('dashboard/trip/add', "Add New Trip Post ", array('style' => 'padding-left:30px')) ?></li>
            </ul>
        </li>

        <li class="accordion-group ">
            <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#stocks-nav">
                <i class="icon-leaf icon-large"></i>  Stocks Management<span class="label label-inverse pull-right">2</span>
            </a>
            <ul class="collapse " id="stocks-nav">
                <li><?php echo anchor('dashboard/stock/index', "Stock List ", array('style' => 'padding-left:30px')) ?></li>
                <li><?php echo anchor('dashboard/stock/add', "Add New Stock ", array('style' => 'padding-left:30px')) ?></li>
            </ul>
        </li>




        <li class="accordion-group ">
            <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#equipment-nav">
                <i class="icon-leaf icon-large"></i>  Equipment Management<span class="label label-inverse pull-right">2</span>
            </a>
            <ul class="collapse " id="equipment-nav">
                <li><?php echo anchor('dashboard/equipment/index', "Equipment List ", array('style' => 'padding-left:30px')) ?></li>
                <li><?php echo anchor('dashboard/equipment/add', "Add New Equipment", array('style' => 'padding-left:30px')) ?></li>
            </ul>
        </li>        

        <li class="accordion-group ">
            <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#contact-nav">
                <i class="icon-certificate icon-large"></i> Contact Us<span class="label label-inverse pull-right">2</span>
            </a>
            <ul class="collapse " id="contact-nav">
                <li><?php echo anchor('dashboard/contact/index', "Contact List ", array('style' => 'padding-left:30px')) ?></li>
                <li><?php echo anchor('dashboard/contact/add', "Add New Contact", array('style' => 'padding-left:30px')) ?></li>
            </ul>
        </li>


        <li class="accordion-group ">
            <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#about-nav">
                <i class="icon-certificate icon-large"></i> About Us<span class="label label-inverse pull-right">2</span>
            </a>
            <ul class="collapse " id="about-nav">
                <li><?php echo anchor('dashboard/about/index', "About Us Edit ", array('style' => 'padding-left:30px')) ?></li>
                <li><?php echo anchor('dashboard/about/add', "Add New About", array('style' => 'padding-left:30px',)) ?></li>
            </ul>
        </li>

        <li class="accordion-group ">
            <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#reg-nav">
                <i class="icon-print icon-large"></i> Users Management <span class="label label-inverse pull-right">4</span>
            </a>
            <ul class="collapse " id="reg-nav">
                <li><?php echo anchor('dashboard/user/index', '<i class="icon-angle-right"></i> User List') ?></li>
                <li><?php echo anchor('dashboard/user/add', '<i class="icon-angle-right"></i> Add User') ?></li>
                <li><?php echo anchor('dashboard/rank/index', '<i class="icon-angle-right"></i> Rank List') ?></li>
                <li><?php echo anchor('dashboard/rank/add', '<i class="icon-angle-right"></i> Add Rank') ?></li>
            </ul>
        </li> 
    </ul>
    <!-- END MAIN NAVIGATION -->

</div>
<!-- END LEFT -->
<!-- BEGIN MAIN CONTENT -->
<div id="content">
    <!-- .outer -->
    <div class="container-fluid outer">

