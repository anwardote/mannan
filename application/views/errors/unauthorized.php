<?php
$this->load->view('head');
$this->load->view('left');
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
                    <div class='indexbody'><hr>
                        <h3 style="color:#ff9933">You are not authorized for this request.</h3>
                        <p>Dear <?php
                            if ($this->session->userdata('name')) {
                                echo $this->session->userdata('name');
                            }
                            ?></p>
                        <p>You are not authorized for this request page. If you have any query please contact with administrator.</p>		
                    </div>

                    <?php
                    $this->load->view('foot');
                    ?>
