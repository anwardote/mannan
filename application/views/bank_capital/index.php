<style>
    .nav {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }
    .nav-tabs {
        border-bottom: 1px solid #ddd;
    }
    .bg-info {
        background-color: #d9edf7;
    }
.nav .nav-tabs li {font-size: 20px;}
</style>
<div class="col-md-12">
    <section class="content">

        <!-- START TAB Display Name -->                  

        <!-- START TAB Display Name -->                  

        <ul class="nav nav-tabs text-bold text-capitalize hover bg-info" style="font-size: 20px">
            <li class="active"><a data-toggle="tab" id="capital_approved_tab_nav" href="#capital_approved_tab">Approved</a></li>
            <li><a data-toggle="tab" id="capital_not_approved_tab_nav" href="#capital_not_approved_tab">Non-Approved</a></li>
            <li><a data-toggle="tab" id="capital_all_record_tab_nav" href="#capital_all_record_tab">All Record</a></li>
            <?php if($this->session->userdata('rank_id') < 4) { ?>
            <li><a data-toggle="tab" id="capital_my_record_tab_nav" href="#capital_my_record_tab">My Capital</a></li>
            <li><a data-toggle="tab" id="capital_my_record_hidden_tab_nav" href="#capital_my_record_hidden_tab">My Capital (Hidden)</a></li>
            <?php } ?>
        </ul>

        <!-- END TAB Display Name --> 

        <!-- START For Displying Employee name and cardname in each tab -->                
        <br>
        <!--div class="box-body no-padding">
            <table class="table table-striped">
                <tr> <th colspan="3">Employee Details</th></tr>
                <tr>
                    <td width='200px'>Employee's Name</td>
                    <td>dffdsfsdfsdfdsf
                    </td>
                </tr>
                <tr><td>Employee's Card No</td>
                    <td>dffdf</td>
                </tr>
            </table>
        </div--> 
        <hr>

        <!-- END For Displying Employee name and cardname in each tab -->  

        <!-- START TAB Anchor -->                 
        <div class="tab-content">
            <div id="capital_approved_tab" class="tab-pane fade in active">
                <div id="div-1" class="accordion-body collapse in body">	<br>
                    <table class="table table-bordered table-condensed table-hover table-responsive">
                        <thead>

                        <th style="width: 40px">ID</th>
                        <th style='text-align: center'>Date</th>
                        <th style="text-align: right">Amount</th>
                        <th style="text-align: right">Total</th>
                        <!--th>Date</th-->
                        <th style="width:40px; text-align: center">Actions</th>

                        </thead>
                        <tbody id="capital_approved_table_data">
                        </tbody>
                    </table>
                </div>

            </div>


            <div id="capital_not_approved_tab" class="tab-pane fade">

                <div class="accordion-body collapse in body">	<br>
                    <table class="table table-bordered table-condensed table-hover table-responsive">
                        <thead>

                        <th style="width: 40px">ID</th>
                        <th style='text-align: center'>Date</th>
                        <th style="text-align: right">Amount</th>
                        <th style="text-align: right">Total</th>
                        <!--th>Date</th-->
                        <th style="width:90px; text-align: center">Actions</th>

                        </thead>
                        <tbody class="bank_capital_notapproved_table">
                        </tbody>
                    </table>

                </div>

                </div>
                
            
            
            
            <div id="capital_all_record_tab" class="tab-pane fade">

                <div class="accordion-body collapse in body">	
                    <br>

                    <table class="table table-bordered table-condensed table-hover table-responsive">
                        <thead>
                                                           
                                <th style="width: 40px">ID</th>
                        <th style='text-align: center'>Date</th>
                                <th style="text-align: right">Amount</th>
                                <th style="text-align: right">Total</th>
                        <th style="text-align: center">Status</th>
                                <!--th>Date</th-->
                        <th style="width:90px; text-align: center">Actions</th>
                 
                        </thead>
                        <tbody class="bank_capital_table_data_all">
                        </tbody>
                    </table>

                </div>
                
            </div>
            
            
            <div id="capital_my_record_tab" class="tab-pane fade">
            
                <div class="accordion-body collapse in body">	
                    <div class="pull-right"><a class="btn btn-success" id="modal-capital-add" href="javascript:void()"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/plus.png"></a></div>

                    <table class="table table-bordered table-condensed table-hover table-responsive">
                        <thead>

                        <th style="width: 40px">ID</th>
                        <th style='text-align: center'>Date</th>
                        <th style="text-align: right">Amount</th>
                        <th style="text-align: right">Total</th>
                        <!--th>Date</th-->
                        <th style="width:180px; text-align: center">Actions</th>

                        </thead>
                        <tbody class="bank_capital_my_record_all">
                        </tbody>
                    </table>

                </div>

            </div>	


            <div id="capital_my_record_hidden_tab" class="tab-pane fade">

                <div class="accordion-body collapse in body">	
                    <div class="pull-right"><a class="btn btn-success" id="modal-capital-add" href="javascript:void()"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/plus.png"></a></div>

                    <table class="table table-bordered table-condensed table-hover table-responsive">
                        <thead>

                        <th style="width: 40px">ID</th>
                        <th style='text-align: center'>Date</th>
                        <th style="text-align: right">Amount</th>
                        <th style="text-align: right">Total</th>
                        <!--th>Date</th-->
                        <th style="width:130px; text-align: center">Actions</th>

                        </thead>
                        <tbody class="bank_capital_my_record_all_hidden">
                        </tbody>
                    </table>

                </div>

            </div>


        </div>

        <!-- END TAB Anchor -->

        <br><br><hr>

    </section>
</div>




<script type="text/javascript">

    $(document).ready(function () {
        loadTableData();

        function loadApprovedCapitalTableData() {
            urls = "<?php echo site_url('dashboard/bank_capital/approvedtable') ?>";
            $.post(urls, function (data) {
                data = JSON.parse(data);
                if (data != "") {
                    var html = '';
                    var i = 1;
                    data.forEach(function (value, index) {
                        html += '<tr>';
                        html += "<td>" + value.id + "</td>";
                        html += "<td style='text-align: center'>" + value.entry_date + "</td>";
                        html += "<td style='text-align: right'><img style='width:20px;' src ='" + value.calc_sign + "'/> &nbsp;" + value.amount + "</td>";
                        html += "<td style='text-align: right'>" + value.total + "</td>";
                        html += '<td>'
                        html += '<a data-id="' + value.id + '" href="javascript:void(0)" class="btn btn-success ViewCapitalbtns" title="Details" ><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/detail.png"></a>';
                        html += '</td>'
                        html += '</tr>';
                    });
                    html += '</table>';
                    $("#capital_approved_table_data").html(html);
                } // If Condtion END

            });
        } // table load end




        function loadTableData_not_approved() {
            urls = "<?php echo site_url('dashboard/bank_capital/notapprovedtable') ?>",
                    $.post(urls, function (data) {
                        data = JSON.parse(data);
                        if (data != "") {
                            var html = '';
                            var i = 1;

                            data.forEach(function (value, index) {
                                html += '<tr>';
                                html += "<td>" + value.id + "</td>";
                                html += "<td style='text-align: center'>" + value.entry_date + "</td>";
                                html += "<td style='text-align: right'><img style='width:20px;' src ='" + value.calc_sign + "'/> &nbsp;" + value.amount + "</td>";
                                html += "<td style='text-align: right'>" + value.total + "</td>";
                                html += '<td>'
                                html += '<a data-id="' + value.id + '"href="javascript:void(0)" class="btn btn-success ViewCapitalbtns" title="Details" ><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/detail.png"></a>';
                                html += '<a data-id="' + value.id + '" href="javascript:void(0)" class="btn btn-info ApprovlCapitalBtn" title="Click here to approve now" style="height: 20px; background: url(<?php echo site_url(); ?>assets/uploads/icons/approved-disabled.png) no-repeat center" ></a>';
                                html += '</td>'
                                html += '</tr>';
                            });
                            html += '</table>';
                            $(".bank_capital_notapproved_table").html(html);
                        } // If Condtion END

                    });
        }




        function loadTableData_all() {
            urls = "<?php echo site_url('dashboard/bank_capital/tabledataall') ?>",
                    $.post(urls, function (data) {
                        data = JSON.parse(data);
                        if (data != "") {
                            var html = '';
                            var i = 1;
                            data.forEach(function (value, index) {
                                html += '<tr>';
                                html += "<td>" + value.id + "</td>";
                                html += "<td style='text-align: center'>" + value.entry_date + "</td>";
                                html += "<td style='text-align: right'><img style='width:20px;' src ='" + value.calc_sign + "'/> &nbsp;" + value.amount + "</td>";
                                html += "<td style='text-align: right'>" + value.total + "</td>";
                                if ((value.approved_by_manager) == null) {
                                    html += "<td style='text-align: center'>Not Approved</td>";
                                } else {
                                    html += "<td style='text-align: center'>Approved</td>";
                                }
                                html += '<td>'
                                html += '<a data-id="' + value.id + '"href="javascript:void(0)" class="btn btn-success ViewCapitalbtns" title="Details" ><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/detail.png"></a>';
                                if ((value.approved_by_manager) == null) {
                                    html += '<a data-id="' + value.id + '" href="javascript:void(0)" class="btn btn-info ApprovlCapitalBtn" title="The Entry is not approved by manager." style="height: 20px; background: url(<?php echo site_url(); ?>assets/uploads/icons/approved-disabled.png) no-repeat center" ></a>';
                                } else {
                                    html += '<a data-id="' + value.id + '"  href="javascript:void(0)" class="btn btn-info ApprovlCapitalBtn disabled" title="The Entry already approved by manager." style="height: 20px; background: url(<?php echo site_url(); ?>assets/uploads/icons/approved.png) no-repeat center" ></a>';
                                }

                                html += '</td>'
                                html += '</tr>';
                            });
                            html += '</table>';
                            $(".bank_capital_table_data_all").html(html);
                        } // If Condtion END

                    });
        }




        function loadTableData_my_capital() {

            urls = "<?php echo site_url('dashboard/bank_capital/mycapitaltable') ?>/",
                    $.post(urls, function (data) {
                        data = JSON.parse(data);

                        if (data != "") {
                            var html = '';
                            var i = 1;
                            data.forEach(function (value, index) {
                                html += '<tr>';
                                html += "<td>" + value.id + "</td>";
                                html += "<td style='text-align: center'>" + value.entry_date + "</td>";
                                html += "<td style='text-align: right'><img style='width:20px;' src ='" + value.calc_sign + "'/> &nbsp;" + value.amount + "</td>";
                                html += "<td style='text-align: right'>" + value.total + "</td>";
                                html += '<td>'
                                html += '<a data-id="' + value.id + '"href="javascript:void(0)" class="btn btn-success ViewCapitalbtns" title="Details" ><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/detail.png"></a>';

                                if ((value.approved_by_manager) == null) {
                                    html += '<a data-id="' + value.id + '" href="javascript:void(0)" class="btn btn-info ApprovlCapitalBtn" title="The Entry is not approved by manager." style="height: 20px; background: url(<?php echo site_url(); ?>assets/uploads/icons/approved-disabled.png) no-repeat center" ></a>';
                                } else {
                                    html += '<a data-id="' + value.id + '"  href="javascript:void(0)" class="btn btn-info ApprovlCapitalBtn disabled" title="The Entry already approved by manager." style="height: 20px; background: url(<?php echo site_url(); ?>assets/uploads/icons/approved.png) no-repeat center" ></a>';
                                }
                                html += '<a data-id="' + value.id + '" data-approval="' + value.approved_by_manager + '" href="javascript:void(0)" class="btn btn-info EditCapitalbtnsClass" title="Edit" ><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/edit.png"></a>';
                                html += '<a data-id="' + value.id + '" data-approval="' + value.approved_by_manager + '" href="javascript:void(0);"  class="btn btn-danger deleteCapitalbtns" title="delete" ><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/Trash.png"></a>';
                                html += '</td>'
                                html += '</tr>';
                            });
                            html += '</table>';
                            $(".bank_capital_my_record_all").html(html);
                        } // If Condtion END

                    });
        }




        function loadTableData_my_capital_hidden() {
            urls = "<?php echo site_url('dashboard/bank_capital/mycapitaltable_hidden') ?>",
                    $.post(urls, function (data) {
                        data = JSON.parse(data);

                        if (data != "") {
                            var html = '';
                            var i = 1;
                            data.forEach(function (value, index) {
                                html += '<tr>';
                                html += "<td>" + value.id + "</td>";
                                html += "<td style='text-align: center'>" + value.entry_date + "</td>";
                                html += "<td style='text-align: right'><img style='width:20px;' src ='" + value.calc_sign + "'/> &nbsp;" + value.amount + "</td>";
                                html += "<td style='text-align: right'>" + value.total + "</td>";
                                html += '<td>'
                                html += '<a data-id="' + value.id + '"href="javascript:void(0)" class="btn btn-success ViewCapitalbtns" title="Details" ><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/detail.png"></a>';
                                html += '<a data-id="' + value.id + '" data-approval="' + value.approved_by_manager + '" href="javascript:void(0)" class="btn btn-info EditCapitalbtnsClass" title="Edit" ><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/edit.png"></a>';
                                html += '<a data-id="' + value.id + '" data-approval="' + value.approved_by_manager + '" href="javascript:void(0);"  class="btn btn-danger deleteCapitalbtns" title="delete" ><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/Trash.png"></a>';
                                html += '</td>'
                                html += '</tr>';
                            });
                            html += '</table>';
                            $(".bank_capital_my_record_all_hidden").html(html);
                        } // If Condtion END

                    });
        }








        function loadTableData() {
            loadApprovedCapitalTableData();
            loadTableData_not_approved();
            loadTableData_all();
            loadTableData_my_capital();
            loadTableData_my_capital_hidden();
        } // Load All Table End


<?php require_once 'assets/bank_js/capital/add_capital.js'; ?>
// Add Capital END

<?php require_once 'assets/bank_js/capital/edit_update_captial.js'; ?>
// Update Capital END

<?php require_once 'assets/bank_js/capital/detail_view.js'; ?>
// Veiw Details with Modal END

        $(document).on('click', '.deleteCapitalbtns', function () {
            var approval = $(this).attr("data-approval");
            if (approval != 'null') {
                alert("The Entry already approved by Manager. So, You are not authoried to modifed it.")
                return;
            }


            $("#deleteModalId").val($(this).attr("data-id"));
            $("#deleteModalSource").val("dashboard/bank_capital/remove");
            $('#myModal_delete').modal({
                backdrop: 'static',
                keyboard: true,
                show: true
            });
        }); // Delete Modal Show END


        $(document).on('click', '.ApprovlCapitalBtn', function () {
            
               if(!confirm("Are you sure want to approved this?")){
                   return;
               }
            var id = $(this).attr("data-id");

            $.ajax({
                url: "<?php echo site_url('dashboard/bank_capital/approval') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function (data) {
                    if (data.status != "error") {
                        alert('The Entry is approved successfully.');
                        loadTableData()
                    } else {
                        alert('You are not authorized person to approve this.');
                    } // If Condtion END

                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Sorry, fail to approved the entry.');
                }
            });


        }); // Delete Modal Show END       




<?php require_once 'assets/bank_js/delete_modal.js'; ?>
// Delete Modal Show END

        $("#ClearBtn").click(function (e) {
            e.preventDefault();
            $("#bank_capital_form").trigger('reset');
        })

        $("#CancelBtn").click(function (e) {
            e.preventDefault();
            $("#bank_capital_form").trigger('reset');
            $("#bank_capital_form").hide('100');
        })

        $("#ClearEditBtn").click(function (e) {
            e.preventDefault();
            $("#bank_capital_form_edit").trigger('reset');
        })

    }) // jquery document ready end


<?php require_once 'assets/bank_js/delete_modal.js'; ?>

    
</script>


<?php
require_once 'add.php';
require_once 'edit.php';
?>