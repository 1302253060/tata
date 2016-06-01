
function calcthis(a)
{ 
var depo = document.getElementById("deposit").value;
 if (depo >= 10)
{	
	document.getElementById("inpvar9").innerHTML = "PLAN E";	
	document.getElementById("inpvar1").innerHTML = "5%";
	var dad = depo/100*5;	
	document.getElementById("inpvar2").innerHTML = dad.toFixed(8);	
	document.getElementById("inpvar3").innerHTML = "350%";				
	var numb = depo/100*350;				
	document.getElementById("inpvar4").innerHTML = numb.toFixed(8);	
	document.getElementById("inpvar5").innerHTML = "250%";			
	var dumb = depo/100*250;				
	document.getElementById("inpvar6").innerHTML = dumb.toFixed(8);	
} 

else if (depo >= 5)
{
	document.getElementById("inpvar9").innerHTML = "PLAN D";	
	document.getElementById("inpvar1").innerHTML = "4.5%";
	var dad = depo/100*4.5;		
	document.getElementById("inpvar2").innerHTML = dad.toFixed(8);	
	document.getElementById("inpvar3").innerHTML = "315%";				
	var numb =  depo/100*315;		
	document.getElementById("inpvar4").innerHTML = numb.toFixed(8);	
	document.getElementById("inpvar5").innerHTML = "215%";				
	var dumb = depo/100*215;				
	document.getElementById("inpvar6").innerHTML = dumb.toFixed(8);	
} 

else if (depo >= 1)
{
	document.getElementById("inpvar9").innerHTML = "PLAN C";	
	document.getElementById("inpvar1").innerHTML = "4%";
	var dad = depo/100*4;		
	document.getElementById("inpvar2").innerHTML = dad.toFixed(8);		
	document.getElementById("inpvar3").innerHTML = "280%";				
	var numb =  depo/100*280;				
	document.getElementById("inpvar4").innerHTML = numb.toFixed(8);	
	document.getElementById("inpvar5").innerHTML = "180%";				
	var dumb = depo/100*180;				
	document.getElementById("inpvar6").innerHTML = dumb.toFixed(8);	
	
 } 

 
else if (depo >= 0.25)
  {
	document.getElementById("inpvar9").innerHTML = "PLAN B";	
	document.getElementById("inpvar1").innerHTML = "3.5%";
	var dad = depo/100*3.5;				
	document.getElementById("inpvar2").innerHTML = dad.toFixed(8);		
	document.getElementById("inpvar3").innerHTML = "245%";				
	var numb =  depo/100*245;		
	document.getElementById("inpvar4").innerHTML = numb.toFixed(8);	
	document.getElementById("inpvar5").innerHTML = "145%";				
	var dumb = depo/100*145;				
	document.getElementById("inpvar6").innerHTML = dumb.toFixed(8);		
  } 

else if (depo >= 0.10)
  {
	document.getElementById("inpvar9").innerHTML = "PLAN A";	
	document.getElementById("inpvar1").innerHTML = "3%";
	var dad = depo/100*3;				
	document.getElementById("inpvar2").innerHTML = dad.toFixed(8);		
	document.getElementById("inpvar3").innerHTML = "210%";				
	var numb =  depo/100*210;		
	document.getElementById("inpvar4").innerHTML = numb.toFixed(8);	
	document.getElementById("inpvar5").innerHTML = "110%";				
	var dumb = depo/100*110;				
	document.getElementById("inpvar6").innerHTML = dumb.toFixed(8);		
  }   

else 
{
	document.getElementById("inpvar1").innerHTML = "N/A";		
	document.getElementById("inpvar2").innerHTML = "N/A";			
	document.getElementById("inpvar3").innerHTML = "N/A";				
	document.getElementById("inpvar4").innerHTML = "N/A";				
	document.getElementById("inpvar5").innerHTML = "N/A";				
	document.getElementById("inpvar6").innerHTML = "N/A";	
	document.getElementById("inpvar9").innerHTML = "N/A";	
}

}
