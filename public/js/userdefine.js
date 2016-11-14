

 var i=0;

function iterate(){
 i++;

document.getElementById('show-token').innerHTML=i;
}
 
 function accepted_s(token,flag)
 {
   $.post('http://localhost/public/genIThubB2X/submit_a_flag',{
                 token: token,
                 flag: flag
             }
             )

  }


