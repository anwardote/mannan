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

</style>
<div class="col-md-12">
    <section class="content">

        <!-- START TAB Display Name -->                  

        <ul class="nav nav-tabs text-bold text-capitalize hover bg-info" style="font-size: 16px">
            <li class="active"><a data-toggle="tab" id="capital_approved_tab_nav" href="#capital_approved_tab">Approved</a></li>
            <li><a data-toggle="tab" id="capital_not_approved_tab_nav" href="#capital_not_approved_tab">Non-Approved</a></li>
            <li><a data-toggle="tab" id="capital_all_record_tab_nav" href="#capital_all_record_tab">All Record</a></li>
            <li><a data-toggle="tab" id="capital_my_record_tab_nav" href="#capital_my_record_tab">My Capital</a></li>
        </ul>
        <!-- END TAB Display Name --> 


        <!-- START For Displying Employee name and cardname in each tab -->                
        <br>


        <div class="box-body no-padding">
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
        </div> 
        <hr>



        <!-- END For Displying Employee name and cardname in each tab -->  



        <!-- START TAB Anchor -->                 
        <div class="tab-content">
            <div id="capital_approved_tab" class="tab-pane fade in active">


                
                <div class="accordion-body collapse in body">	
                    <div class="pull-right"><a class="btn btn-success" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_add" id="NewEntryBtn" href="javascript:void()"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/plus.png"></a></div>
                    <?php
                    include_once  'add.php';
                    include_once 'edit.php';
                    ?>
                    <table class="table table-bordered table-condensed table-hover table-responsive">
                        <thead>
                                                           
                                <th style="width: 40px">ID</th>
                                <th>Type</th>
                                <th style="text-align: right">Amount</th>
                                <th style="text-align: right">Total</th>
                                <!--th>Date</th-->
                                <th style="width:130px; text-align: center">Actions</th>
                 
                        </thead>
                        <tbody class="bank_capital_approved_table">
                        </tbody>
                    </table>

                </div>



            </div>
            <div id="capital_not_approved_tab" class="tab-pane fade">

                <div class="accordion-body collapse in body">	
                    <div class="pull-right"><a class="btn btn-success" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_add" id="NewEntryBtn" href="javascript:void()"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/plus.png"></a></div>
                    <?php
                    include_once  'add.php';
                    include_once 'edit.php';
                    ?>
                    <table class="table table-bordered table-condensed table-hover table-responsive">
                        <thead>
                                                           
                                <th style="width: 40px">ID</th>
                                <th>Type</th>
                                <th style="text-align: right">Amount</th>
                                <th style="text-align: right">Total</th>
                                <!--th>Date</th-->
                                <th style="width:130px; text-align: center">Actions</th>
                 
                        </thead>
                        <tbody class="bank_capital_notapproved_table">
                        </tbody>
                    </table>

                </div>
                
            </div>
            
            
            
            <div id="capital_all_record_tab" class="tab-pane fade">

                <div class="accordion-body collapse in body">	
                    <div class="pull-right"><a class="btn btn-success" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_add" id="NewEntryBtn" href="javascript:void()"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/plus.png"></a></div>
                    <?php
                    include_once  'add.php';
                    include_once 'edit.php';
                    ?>
                    <table class="table table-bordered table-condensed table-hover table-responsive">
                        <thead>
                                                           
                                <th style="width: 40px">ID</th>
                                <th>Type</th>
                                <th style="text-align: right">Amount</th>
                                <th style="text-align: right">Total</th>
                                <!--th>Date</th-->
                                <th style="width:130px; text-align: center">Actions</th>
                 
                        </thead>
                        <tbody class="bank_capital_table_data_all">
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
    $(function () {
        $('.datepicker').datepicker();
    })
</script>
<script>

    $(document).ready(function () {
        $("#SubmitBtn").click(function (e) {
            e.preventDefault();
            url = "<?php echo site_url('dashboard/bank_capital/new_capital') ?>";
            $.ajax({
                url: url,
                type: "POST",
                data: $("#bank_capital_form").serialize(),
                dataType: "JSON",
                success: function (data)
                {
                    if (data.status) //if success close modal and reload ajax table
                    {
                        loadTableData();
                        $("#bank_capital_form").trigger('reset');
                        $('#myModal_add').modal('hide');
                    } else
                    {
                        for (var i = 0; i < data.inputerror.length; i++)
                        {
                            $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    loadTableData();
                    alert('Fail to add new entry..')
                }
            });
        })


// Update Entry

        $("#SubmitUpdateBtn").click(function (e) {
            e.preventDefault();
            url = "<?php echo site_url('dashboard/bank_capital/update') ?>";
            $.ajax({
                url: url,
                type: "POST",
                data: $("#bank_capital_form_edit").serialize(),
                dataType: "JSON",
                success: function (data)
                {
                    if (data.status) //if success close modal and reload ajax table
                    {

                        loadTableData();
                        // $("#bank_capital_form_edit").trigger('reset');
                        $('#myModal_edit').modal('hide');
                    } else
                    {
                        for (var i = 0; i < data.inputerror.length; i++)
                        {
                            $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    loadTableData();
                    alert('Fail to add new entry..')
                }
            });
        })
        //////////////////////////////////////////////// Submit END

        $("#ClearBtn").click(function (e) {
            e.preventDefault();
            $("#bank_capital_form").trigger('reset');
        })

        $("#CancelBtn").click(function (e) {
            e.preventDefault();
            $("#bank_capital_form").trigger('reset');
            $("#bank_capital_form").hide('100');
        })
    })
</script>

<?php
include_once 'view.php';
?>
<script>

    function cancelBtnview() {
        $("#viewdetail").hide(200)
    }
    
    loadTableData_approved();
    loadTableData_not_approved();
    loadTableData_all();
    loadTableData_my_capital();
    
    function loadTableData_approved() {
        urls = "<?php echo site_url('dashboard/bank_capital/approvedtable') ?>",
        $.post(urls, function (data) {
            data = JSON.parse(data);
            if (data != "") {
                var html = '';
                var i = 1;
                data.forEach(function (value, index) {

                    html += '<tr>';
                    //html += "<td>" + i++ + "</td>";
                    html += "<td>" + value.id + "</td>";
                    html += "<td>" + value.t_type + "</td>";
                    html += "<td style='text-align: right'>" + value.amount + "</td>";
                    html += "<td style='text-align: right'>" + value.total + "</td>";
                   // html += "<td>" + value.entry_date + "</td>";
                    html += '<td>'
                    html += '<a href="javascript:void()" class="btn btn-success" title="Details" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_view" onClick= "detail_capital(' + value.id + ')"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/detail.png"></a>';
                    html += '</td>'
                    html += '</tr>';
                });
                html += '</table>';
                $(".bank_capital_approved_table").html(html);
            } // If Condtion END

        });
    }
    
    
    
function loadTableData_not_approved() {
        urls = "<?php echo site_url('dashboard/bank_capital/notapprovedtable') ?>",
        $.post(urls, function (data) {
            data = JSON.parse(data);
            if (data != "") {
                var html = '';
                var i = 1;
                data.forEach(function (value, index) {

                    html += '<tr>';
                    //html += "<td>" + i++ + "</td>";
                    html += "<td>" + value.id + "</td>";
                    html += "<td>" + value.t_type + "</td>";
                    html += "<td style='text-align: right'>" + value.amount + "</td>";
                    html += "<td style='text-align: right'>" + value.total + "</td>";
                   // html += "<td>" + value.entry_date + "</td>";
                    html += '<td>'
                    html += '<a href="javascript:void()" class="btn btn-success" title="Details" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_view" onClick= "detail_capital(' + value.id + ')"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/detail.png"></a>';
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
                    //html += "<td>" + i++ + "</td>";
                    html += "<td>" + value.id + "</td>";
                    html += "<td>" + value.t_type + "</td>";
                    html += "<td style='text-align: right'>" + value.amount + "</td>";
                    html += "<td style='text-align: right'>" + value.total + "</td>";
                   // html += "<td>" + value.entry_date + "</td>";
                    html += '<td>'
                    html += '<a href="javascript:void()" class="btn btn-success" title="Details" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_view" onClick= "detail_capital(' + value.id + ')"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/detail.png"></a>';
                    html += '<a href="javascript:void()" class="btn btn-info" title="Edit" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_edit" onClick= "edit_capital(' + value.id + ')"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/edit.png"></a>';
                    html += '<a href="javascript:void()" class="btn btn-danger" title="delete" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_delete" onClick= "delete_capital(' + value.id + ')"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/Trash.png"></a>';
                    html += '</td>'
                    html += '</tr>';
                });
                html += '</table>';
                $(".bank_capital_table_data_all").html(html);
            } // If Condtion END

        });
    }     
    
    
    

    function loadTableData_my_capital() {
        urls = "<?php echo site_url('dashboard/bank_capital/table') ?>/" + status,
        $.post(urls, function (data) {
            data = JSON.parse(data);
            if (data != "") {
                var html = '';
                var i = 1;
                data.forEach(function (value, index) {

                    html += '<tr>';
                    //html += "<td>" + i++ + "</td>";
                    html += "<td>" + value.id + "</td>";
                    html += "<td>" + value.t_type + "</td>";
                    html += "<td style='text-align: right'>" + value.amount + "</td>";
                    html += "<td style='text-align: right'>" + value.total + "</td>";
                   // html += "<td>" + value.entry_date + "</td>";
                    html += '<td>'
                    html += '<a href="javascript:void()" class="btn btn-success" title="Details" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_view" onClick= "detail_capital(' + value.id + ')"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/detail.png"></a>';
                    html += '<a href="javascript:void()" class="btn btn-info" title="Edit" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_edit" onClick= "edit_capital(' + value.id + ')"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/edit.png"></a>';
                    html += '<a href="javascript:void()" class="btn btn-danger" title="delete" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_delete" onClick= "delete_capital(' + value.id + ')"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/Trash.png"></a>';
                    html += '</td>'
                    html += '</tr>';
                });
                html += '</table>';
                $(".bank_capital_table_class").html(html);
            } // If Condtion END

        });
    }
    
        
    
    
    
    
    function delete_capital(id) {
        $("#deleteModalId").val(id);
        $("#deleteModalSource").val("dashboard/bank_capital/remove");
    }

$("#capital_not_approved_tab_nav").click(function(e){
    e.preventDefault();
    loadTableData("not-approved")
})

$("#capital_approved_tab_nav").click(function(e){
    e.preventDefault();
    loadTableData("approved")
})
</script>
