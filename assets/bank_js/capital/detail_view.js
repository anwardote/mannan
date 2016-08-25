$(document).ready(function () {
    
    $(document).on('click', '.ViewCapitalbtns', function () {
        var id = $(this).attr("data-id");

        $('#myModal_view').modal({
            backdrop: 'static',
            keyboard: true,
            show: true
        });

        $.ajax({
            url: "<?php echo site_url('dashboard/bank_capital/viewdetail') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                // data = JSON.parse(data);
                if (data != "") {
                    var html = '';
                    var i = 1;
                    html += '<table class="table table-bordered table-condensed table-hover table-striped"><thead></thead><tbody>';
                    data.forEach(function (value, index) {
                        html += '<tr>';
                        html += "<td class='headofst_single'> ID </td>";
                        html += "<td>" + value.id + "</td>";
                        html += '<tr>';
                        html += '<tr>';
                        html += "<td class='headofst_single'> Date </td>";
                        html += "<td>" + value.entry_date + "</td>";
                        html += '<tr>';
                        html += '<tr>';
                        html += "<td class='headofst_single'> Transaction Type </td>";
                        html += "<td>" + value.t_type + "</td>";
                        html += '<tr>';
                        html += '<tr>';
                        html += "<td class='headofst_single'> Amount </td>";
                        html += "<td>" + value.amount + "</td>";
                        html += '<tr>';
                        html += '<tr>';
                        html += "<td class='headofst_single'> Description </td>";
                        html += "<td>" + value.description + "</td>";
                        html += '<tr>';
                        html += '<tr>';
                        html += "<td class='headofst_single'> Owner Approval </td>";
                        html += "<td>" + value.approved_by_owner + "</td>";
                        html += '<tr>';
                        html += '<tr>';
                        html += "<td class='headofst_single'> Manager Approval </td>";
                        html += "<td>" + value.approved_by_manager + "</td>";
                        html += '<tr>';
                        html += '<tr>';
                        html += "<td class='headofst_single'> Is Hidden </td>";
                        html += "<td>" + value.hidden + "</td>";
                        html += '<tr>';
                        html += '<tr>';
                        html += "<td class='headofst_single'> Comments </td>";
                        html += "<td>" + value.comments + "</td>";
                        html += '<tr>';
                        html += '<tr>';
                        html += "<td class='headofst_single'> Created by </td>";
                        html += "<td>" + value.created_by + "</td>";
                        html += '<tr>';
                        html += '<tr>';
                        html += "<td class='headofst_single'> Created </td>";
                        html += "<td>" + value.created_at + "</td>";
                        html += '<tr>';
                        html += '<tr>';
                        html += "<td class='headofst_single'> Last updated</td>";
                        html += "<td>" + value.updated_at + "</td>";
                    });
                    html += '</tbody></table>';
                    $("#myModal_view .modal-body").html(html);
                    $("#myModal_view .modal-title").html("Details Information");
                } // If Condtion END

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });

    }); // Delete Modal Show END

})