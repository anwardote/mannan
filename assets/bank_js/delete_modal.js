$(document).ready(function () {

    $(".cleardeleteform").click(function (e) {
        $("#deleteModalForm").trigger('reset');

    })

    $(".submitdeleteModalbtn").click(function (e) {
        var RouteSource = $("#deleteModalSource").val();

        if ($.trim($("#DeletemodalComments").val()) == "") {
            alert("Reason Field is required.");
            return false;
        }
        url = "<?php echo site_url() ?>" + RouteSource;
        $.ajax({
            url: url,
            type: "POST",
            data: $("#deleteModalForm").serialize(),
            dataType: "JSON",
            success: function (data)
            {
                if (data.status) {
                    $('#myModal_delete').modal('hide');
                    $("#deleteModalForm").trigger('reset');

                    loadTableData();
                    alert('The Entry is deleted successfully');


                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                loadTableData();
                alert('Fail to delete the entry.')
            }
        });
    })









})