$(document).ready(function () {


    $(document).on('click', '#modal-capital-add', function () {
        $('#myModal_capital_add').modal({
            backdrop: 'static',
            keyboard: true,
            show: true
        });

        $("#bank_capital_form").show('100');
        $("#bank_capital_form").trigger('reset');
    }); // Show ADD NEW MOdal

    $("#Capital_add_submit_Btn").click(function (e) {
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
                    $('#myModal_capital_add').modal('hide');
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



})