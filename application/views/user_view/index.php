<div class="row-fluid">
    <!-- .inner -->
    <div class="span12 inner">
        <!--Begin Datatables-->
        <div class="row-fluid">
            <div class="span12">
                <div class="box">
                    <header>
                        <div class="icons"><i class="icon-move"></i></div>
                        <h5>List of Users</h5>

                    </header>

                    <div id="collapse4" class="body">
                        <div class="pull-right"><a class="btn btn-info" href="<?php echo site_url('dashboard/user/add'); ?>">New</a></div>
                        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Rank</th>
                                    <th>Status</th>
                                    <th>Is Banned</th>
                                    <th>Remark</th>
                                    <th style="width:90px; text-align: center">Photo</th>
                                    <th style="width:60px; text-align: center">Actions</th>														

                                </tr>
                            </thead>
                            <tbody>
                            <a href="#" title="sdf" target="_blank"></a>


                            <?php
                            $i = 1;
                            foreach ($users as $u):
                                ?>
                                <tr>
                                    <td><?php echo $i++ ?></td>
                                    <td><?php echo $u['name']; ?></td>
                                    <td><?php echo $u['email']; ?></td>
                                    <td><?php echo $u['rank_id']; ?></td>
                                    <td><?php echo $u['status']; ?></td>
                                    <td><?php echo $u['is_banned']; ?></td>
                                    <td><?php echo $u['remark']; ?></td>
       
                                    <td class="center-block">
                                        <a href="<?php echo site_url(); ?>assets/uploads/users/<?php echo $u['thumbnil']; ?>" target="_blank" title="Click here for full view image">
                                            <img style="width:80px" class="img-thumbnail img-responsive" src="<?php echo site_url(); ?>assets/uploads/users/<?php echo $u['thumbnil_thumb']; ?>">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo site_url('dashboard/user/edit/' . $u['id']); ?>" class="btn btn-info" ><img style="width: 25px" src="<?php echo site_url(); ?>assets/uploads/icons/edit.png"></a> 
                                        <a href="<?php echo site_url('dashboard/user/remove/' . $u['id']); ?>" class="btn btn-danger delete"><img style="width: 25px" src="<?php echo site_url(); ?>assets/uploads/icons/Trash.png"></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                            </tbody>
                        </table>
                    </div>

