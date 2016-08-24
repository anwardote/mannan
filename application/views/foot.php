
</div>
</div>
<!--End Datatables-->


<!-- /.row-fluid -->
</div>
<!-- /.inner -->
</div>	
<!-- /.row-fluid -->
</div>
<!-- /.outer -->
</div>
<!-- END CONTENT -->


<!-- #push do not remove -->
<div id="push"></div>
<!-- /#push -->
</div>
<!-- END WRAP -->

<div class="clearfix"></div>

<!-- BEGIN FOOTER -->
<div id="footer">
    <p><?php echo date("Y"); ?> &copy; All rights reserved.</p>
</div>
<!-- END FOOTER -->

<!-- #helpModal -->
<div id="helpModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="helpModalLabel"
     aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h3 id="helpModalLabel"><i class="icon-external-link"></i> Help</h3>
    </div>
    <div class="modal-body">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.
        </p>
    </div>
    <div class="modal-footer">

        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    </div>
</div>
</body>
</html>
<script>
    $(".delete").click(function () {
        return confirm("Are you sure to delete this?");
    });
    $('#myModal_view').modal({backdrop: 'static', keyboard: false})

    $("input").change(function () {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function () {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function () {
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
</script>



<div class="modal fade" id="myModal_view" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">

                <a type="button" class="btn btn-danger btn-submit" data-dismiss="modal"><img style="width: 25px" height="25px" src="<?php echo site_url(); ?>assets/uploads/icons/hidden.png"></a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal_delete" role="dialog" style="display: none">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Worning Message</h4>
            </div>
            <div class="modal-body">

                <h5 class="text-danger">Lets us know why do you want to delete it.</h5>
                <form id="deleteModalForm" name="deleteModalForm">
                    <input type="hidden" name="id" id="deleteModalId" value=""/>
                    <input type="hidden" id="deleteModalSource" value=""/>
                    <label for="comments" class="col-md-4 control-label">Short Description</label>
                    <textarea name="comments" id="DeletemodalComments" class="form-control" style="width:95%" placeholder="Please write reason" ></textarea>

                    <a href="javascript:void()" class="btn btn-info btn-submit cleardeleteform"><img style="width: 25px" height="25px" src="<?php echo site_url(); ?>assets/uploads/icons/clear.png"></a>
                    <a href="javascript:void()" onsubmit="return checkform()" class="btn btn-danger btn-submit submitdeleteModalbtn"><img style="width: 25px" height="25px" src="<?php echo site_url(); ?>assets/uploads/icons/Trash.png"></a>

                </form>
            </div>
            <div class="modal-footer">

                <a type="button" class="btn btn-danger btn-submit" data-dismiss="modal"><img style="width: 25px" height="25px" src="<?php echo site_url(); ?>assets/uploads/icons/hidden.png"></a>
            </div>
        </div>
    </div>
</div>

<script>
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
        alert(url);
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

</script>