

 var i=0;

function iterate(){
 i++;

document.getElementById('show').innerHTML=i;
}


$(document).ready(function() {
  $('a.pagerlink').click(function() {
  var id=$(this).attr('id');
  	var purpose=$(this).attr('name');
  
  });
});
