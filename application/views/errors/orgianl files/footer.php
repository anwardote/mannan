</div>
<script src="../../src/script/jquery-1.12.0.min.js"></script>
<script src="<?php echo site_url()?>/src/script/jquery-1.12.0.min.js"></script>
<script src="<?php echo site_url()?>/src/script/bootstrap.min.js"></script>
<script>
$(document).ready(function(e) {
    $("#pagination").addClass("pagination pagination-sm pull-right");
	$("#pagination > *").wrap("<li></li>")
	var mytext=$("#pagination li strong").html();
	$("#pagination li strong").parent().addClass('active')
	$("#pagination li strong").replaceWith("<a>"+mytext+"</a>")
	
});
</script>
</body>
</html>