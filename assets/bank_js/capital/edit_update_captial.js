$(document).ready(function () {
    $(document).on('click', '.EditCapitalbtnsClass', function () {
        var approval = $(this).attr("data-approval");
        if (approval != 'null') {
            alert("The Entry already approved by Manager. So, You are not authoried to modifed it.")
            return;
        }

        var id = $(this).attr("data-id");
        $('#myModal_capital_edit').modal({
            backdrop: 'static',
            keyboard: true,
            show: true
        });

        $("#bank_capital_form_edit").show('100');
        $.ajax({
            url: "<?php echo site_url('dashboard/bank_capital/edit') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                if (data != "") {
                    data.forEach(function (value, index) {
                        $('#bank_capital_form_edit [name="t_type"]').val(value.t_type);
                        $('#bank_capital_form_edit [name="amount"]').val(value.amount);
                        $('#bank_capital_form_edit [name="entry_date"]').val(value.entry_date);
                        $('#bank_capital_form_edit [name="description"]').val(value.description);
                        $('#bank_capital_form_edit [name="hidden"]').val(value.hidden);
                        $('#bank_capital_form_edit [name="comments"]').val(value.comments);
                        $('#bank_capital_form_edit [name="edit-id"]').val(value.id);
                    })
                } // If Condtion END

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    });

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
                    $('#myModal_capital_edit').modal('hide');
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
    }) // Update END
})