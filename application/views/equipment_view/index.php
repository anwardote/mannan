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
                        <h5>Equipments List</h5>

                    </header>

                    <div id="collapse4" class="body">
                        <div class="pull-right"><a class="btn btn-info" href="<?php echo site_url('dashboard/equipment/add'); ?>">New</a></div>
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Title</td>
                                    <td>Description</td>
                                    <td>Is Hidden</td>
                                    <td>Last Updated</td>
                                   <th style="width:60px; text-align: center">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                            <a href="#" title="sdf" target="_blank"></a>
                            <?php
                            $i = 1;
                            foreach ($equipments as $e):
                                ?>
                                <tr>
                                    <td><?php echo $e['id']; ?></td>
                                    <td><?php echo $e['title']; ?></td>
                                    <td><?php echo $e['description']; ?></td>
                                    <td><?php echo $e['is_hidden']; ?></td>
                                    <td><?php echo $e['updated']; ?></td>
                                    <td>

                                            <a href="<?php echo site_url('dashboard/equipment/edit/' . $e['id']); ?>" class="btn btn-info" ><img style="width: 25px" src="<?php echo site_url(); ?>assets/uploads/icons/edit.png"></a> 
                                            <a href="<?php echo site_url('dashboard/equipment/remove/' . $e['id']); ?>" class="btn btn-danger delete"><img style="width: 25px" src="<?php echo site_url(); ?>assets/uploads/icons/Trash.png"></a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>


                    <?php
                    $this->load->view('foot');
                    ?>


