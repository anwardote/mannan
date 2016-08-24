//alert("loaded");
$(document).ready(function(e){
$("body").css("background-color","#c9c9c9");
//$(".current-menu-item").addClass("active");

wp.customize('edu_footer_social_facebook', function( value ) {
value.bind(function(to) {
//$('#footer .contact').html( to );
alert(to);
});
});

});

/*
jQuery(document).ready(function($) {
wp.customize('edu_footer_text', function( value ) {
value.bind(function(to) {
$('#footer .contact').html( to );
});
});
});
*/