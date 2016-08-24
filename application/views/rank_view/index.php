<?php
$this->load->view('head');
$this->load->view('left');
?>


<div class="row-fluid">
    <!-- .inner -->
    <div class="span12 inner">
        <!--Begin Datatables-->
        <div class="row-fluid">
            <div class="span12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-move"></i></div>
                        <h5>List of Ranks</h5>

                    </header>

                    <div id="collapse4" class="body">
                        <div class="pull-right"><a class="btn btn-info" href="<?php echo site_url('dashboard/rank/add'); ?>">New</a></div>
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                                <tr>

                                    <td>ID</th>
                                    <th>Rank Title</th>
                                    <th>Description</th>
                                    <th>Permission</th>
                                    <th style="width:60px; text-align: center">Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                            <a href="#" title="sdf" target="_blank"></a>


                            <?php
                            $i = 1;
                            foreach ($ranks as $r):
                                ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $r['rank']; ?></td>
                                    <td><?php echo $r['description']; ?></td>
                                    <td><?php echo $r['permission']; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('dashboard/rank/edit/' . $r['id']); ?>" class="btn btn-info" ><img style="width: 25px" src="<?php echo site_url(); ?>assets/uploads/icons/edit.png"></a> 
                                        <!--a href="<?php //echo site_url('dashboard/rank/remove/' . $r['id']); ?>" class="btn btn-danger delete"><img style="width: 25px" src="<?php echo site_url(); ?>assets/uploads/icons/Trash.png"></a-->

                                    </td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>


                    <?php
                    $this->load->view('foot');
                    ?>