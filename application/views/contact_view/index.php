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
                        <h5>Contact List</h5>

                    </header>

                    <div id="collapse4" class="body">
                        <div class="pull-right"><a class="btn btn-info" href="<?php echo site_url('dashboard/contact/add'); ?>">New</a></div>
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Is Hidden</th>
                                    <th>Last Updated</th>
                                   <th style="width:60px; text-align: center">Actions</th> 
                                </tr>
                            </thead>
                            <tbody>
                            <a href="#" title="sdf" target="_blank"></a>


                            <?php
                            $i = 1;
                            if (isset($contact)) {
                                foreach ($contact as $c):
                                    ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $c['title']; ?></td>
                                        <td><?php echo $c['description']; ?></td>
                                        <td><?php echo $c['is_hidden']; ?></td>
                                        <td><?php echo $c['updated']; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('dashboard/contact/edit/' . $c['id']); ?>" class="btn btn-info" ><img style="width: 25px" src="<?php echo site_url(); ?>assets/uploads/icons/edit.png"></a> 
                                            <a href="<?php echo site_url('dashboard/contact/remove/' . $c['id']); ?>" class="btn btn-danger delete"><img style="width: 25px" src="<?php echo site_url(); ?>assets/uploads/icons/Trash.png"></a>

                                        </td>
                                    </tr>
                                <?php endforeach;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                    $this->load->view('foot');
                    ?>