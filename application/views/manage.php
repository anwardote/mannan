<?php
$this->load->view('head');
//$this->load->view('left');
require_once 'footsrc.php';
?>

<!-- #content -->

<div class="row-fluid">
    <div class="span12">
        <div class="box dark">




            <div id="menu-items">

                <ul id="menu" class="unstyled accordion collapse in">

                    <li class="accordion-group ">
                        <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#capital-nav-tab">
                            <h5 style="font-size: 18px; color:white; margin: 0"> <i class="icon-tasks icon-large"></i> Bank Capital</h5>
                             </a>

                        <ul class="collapse list-group" id="capital-nav-tab">

                            <?php require_once 'bank_capital/index.php'; ?>

                        </ul>
                    </li>

                    <li class="accordion-group ">
                        <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#student-nav">
                            <i class="icon-globe icon-large"></i> Posts Management<span class="label label-inverse pull-right">4</span>
                        </a>
                        <ul class="collapse " id="student-nav">

<?php
            require_once 'user_view/index.php';
?>
                        </ul>
                    </li>
                </ul>
            </div>


<?php
$this->load->view('foot');
?>




