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
            <li class="active"><a data-toggle="tab" href="#capital_approved_tab">Approved</a></li>
            <li><a data-toggle="tab" href="#capital_not_approved_tab">Non-Approved</a></li>
            <li><a data-toggle="tab" href="#capital_all_record_tab">All Record</a></li>
            <li><a data-toggle="tab" href="#capital_my_record_tab">My Capital</a></li>
            <li><a data-toggle="tab" href="#emp_education">Education</a></li>
            <li><a data-toggle="tab" href="#emp_leave_status_pvt">Leave</a></li>
            <li><a data-toggle="tab" href="#emp_attachment_nav">Attachment</a></li>
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


                <div id="div-1" class="accordion-body collapse in body">	
                    <div class="pull-right"><a class="btn btn-success" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_add" id="NewEntryBtn" href="javascript:void()"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/plus.png"></a></div>
                    <?php
                    include 'add.php';
                    include_once 'edit.php';
                    ?>
                    <table id="dataTable" class="table table-bordered table-condensed table-hover table-responsive">
                        <thead>
                            <tr>                                   
                                <th style="width: 40px">ID</th>
                                <th>Type</th>
                                <th>Amount</th>                            
                                <th>Date</th>
                                <th style="width:180px; text-align: center">Actions</th>
                            </tr>                                    

                            </tr>
                        </thead>
                        <tbody id="bank_capital_table">
                        </tbody>
                    </table>

                </div>












            </div>

            <div id="emp_addresss" class="tab-pane fade">

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
    loadTableData();
    function loadTableData() {
        urls = "<?php echo site_url('dashboard/bank_capital/table') ?>";
        $.post(urls, function (data) {
            data = JSON.parse(data);
            if (data != "") {
                var html = '';
                var i = 1;
                data.forEach(function (value, index) {

                    html += '<tr>';
                    html += "<td>" + i++ + "</td>";
                    html += "<td>" + value.t_type + "</td>";
                    html += "<td>" + value.amount + "</td>";
                    html += "<td>" + value.entry_date + "</td>";
                    html += '<td>'
                    html += '<a href="javascript:void()" class="btn btn-success" title="Details" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_view" onClick= "detail_capital(' + value.id + ')"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/detail.png"></a>';
                    html += '<a href="javascript:void()" class="btn btn-info" title="Edit" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_edit" onClick= "edit_capital(' + value.id + ')"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/edit.png"></a>';
                    html += '<a href="javascript:void()" class="btn btn-danger" title="delete" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_delete" onClick= "delete_capital(' + value.id + ')"><img style="width:25px" src="<?php echo site_url(); ?>assets/uploads/icons/Trash.png"></a>';
                    html += '</td>'
                    html += '</tr>';
                });
                html += '</table>';
                $("#bank_capital_table").html(html);
            } // If Condtion END

        });
    }
    function delete_capital(id) {
        $("#deleteModalId").val(id);
        $("#deleteModalSource").val("dashboard/bank_capital/remove");
    }

</script>
