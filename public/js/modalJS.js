$(document).ready(function() {

$('.change').click(function() {
var id =$(this).data('id');
$("#chpass").val(id);

});
});
