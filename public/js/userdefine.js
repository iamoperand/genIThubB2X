

 var i=0;

function iterate(){
 i++;

document.getElementById('show-id').innerHTML=i;
}


$(document).ready(function() {
  $('a.pagerlink').click(function() {
  var id=$(this).attr('id');
  	var purpose=$(this).attr('name');
  
  $.post('http://localhost:8000/info',
    {
        task: "display",
       show-purpose: _purpose
    })
    .error(
        ...
     )
    .success(
        function( data )
                    {
                        (jQuery.parseJSON( data ));
                      document.getElementById('show-purpose').innerHTML = "RESPONSE TEXT:" + data;

                    }
     );
}
});
