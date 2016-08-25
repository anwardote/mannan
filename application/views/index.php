<?php
$this->load->view('head');
//$this->load->view('left');
?>
<style>
    .indexbody { padding: 10px}
</style>

<div class="row-fluid">
    <!-- .inner -->
    <div class="span12 inner">
        <!--Begin Datatables-->
        <div class="row-fluid">
            <div class="span12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-move"></i></div>
                        <h3></h3>
                    </header>
                    <div class='indexbody'>
                        <h3>Welcome <?php echo $this->session->userdata('name'); ?> !!!</h3>

                        <p>Below very important link for quick access. <?php echo $this->session->userdata('permission'); ?></p>
                        <ul>
                            <li><?php echo anchor('dashboard/user/index', '<i class="icon-angle-right"></i> Manage Register Users') ?></li>
                            <li><?php echo anchor('dashboard/rank/index', '<i class="icon-angle-right"></i> Manage User\'s Ranks') ?></li>
                            <li><?php echo anchor('dashboard/tcategory/index', '<i class="icon-angle-right"></i> Manage Trip Categories') ?></li>
                            <li><?php echo anchor('dashboard/pcategory/index', '<i class="icon-angle-right"></i> Manage Picture Categories') ?></li>
                            <li><?php echo anchor('dashboard/picture/index', '<i class="icon-angle-right"></i> Manage Picture Posts') ?></li>            
                            <li><?php echo anchor('dashboard/trip/index', '<i class="icon-angle-right"></i> Manage Trip Posts') ?></li>	                           	

                        </ul>

                    </div>

                    <?php
                    $this->load->view('foot');
                    ?>
