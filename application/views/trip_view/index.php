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
                        <h5>Trip Posts List</h5>

                    </header>

                    <div id="collapse4" class="body">
                        <div class="pull-right"><a class="btn btn-info" href="<?php echo site_url('dashboard/trip/add'); ?>">New</a></div>
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                                <tr>                                   
                                    <th style="width: 40px">ID</th>
                                    <th>Title</th>
                                    <th style="width: 15%;">Category</th>
                                    <th style="width:90px; text-align: center">Thumbnil</th>
                                    <th style="width:20px">Hidden?</th>
                                    <th style="width: 10%;">Created By</th>
                                    <th style="width:40px">Created</th>
                                    <th style="width:60px; text-align: center">Actions</th>
                                </tr>                                    

                                </tr>
                            </thead>
                            <tbody>
                            <a href="#" title="sdf" target="_blank"></a>


                            <?php
                            $i = 1;
                            foreach ($trips as $t):
                                ?>
                                <tr>
                                    <td><?php echo $t['id']; ?></td>
                                    <td><?php echo $t['title']; ?></td>
                                    <td><?php echo $t['tcategorie_id']; ?></td>

                                    <td>
                                        <a href="<?php echo site_url(); ?>assets/uploads/trips/<?php echo $t['thumbnil']; ?>" target="_blank" title="Click here for full view image">
                                            <img style="width:80px" class="img-thumbnail img-responsive" src="<?php echo site_url(); ?>assets/uploads/trips/<?php echo $t['thumbnil_thumb']; ?>">
                                        </a>
                                    </td>
                                    <td><?php echo $t['is_hidden']; ?></td>
                                    <td><?php echo $t['created_by']; ?></td>
                                    <td><?php echo $t['created']; ?></td>                                   
                                    <td>
                                        <a href="<?php echo site_url('dashboard/trip/edit/' . $t['id']); ?>" class="btn btn-info"><img style="width: 25px" src="<?php echo site_url(); ?>assets/uploads/icons/edit.png"></a> 
                                        <a href="<?php echo site_url('dashboard/trip/remove/' . $t['id']); ?>" class="btn btn-danger delete"><img style="width: 25px" src="<?php echo site_url(); ?>assets/uploads/icons/Trash.png"></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>


                    <?php
                    $this->load->view('foot');
                    ?>
                    