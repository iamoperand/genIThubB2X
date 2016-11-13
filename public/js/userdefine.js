

 var i=0;

function iterate(){
 i++;

document.getElementById('show').innerHTML=i;
}

var id, purpose, name, mobile;


function process1_1(){
	/*Comes from enquiry page*/
    
   	purpose=document.getElementById('1').getAttribute('name');
   	alert(purpose);
   	return purpose;

}

var process1_1_data = process1_1();

function process1_2(){
	/*Comes from enquiry page*/
    
    purpose=document.getElementById('2').getAttribute('name');
  	
  	return purpose;

  

}
var process1_2_data = process1_2();

function process1_3(){
	/*Comes from enquiry page*/
    
    purpose=document.getElementById('3').getAttribute('name');
  	
  	
  	return purpose;
  

}
var process1_3_data = process1_3();



function process_test(){
	alert(process1_1_data);
}
function process2(){


  /*Comes from info page*/
  $('#name_info').change(function(){
  	name = $(this).val();
  	alert(name);


  });


  $('#mobile_info').change(function(){
  	mobile = $(this).val();
  	
  });

}
  

