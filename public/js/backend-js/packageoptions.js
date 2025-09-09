//check if jamaat is selected

$("#typeselect").hover(function(){
//null
}
,function(){

var type=$( "#typeselect" ).val();
	if (type=="") {
		document.getElementById("packageselect").options.length = 1;
	}else{
		
	showpackage(type);
	}
}
); 

//show packages in drop down according to selected type
function showpackage(id) {

		
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
       	
      		document.getElementById("packageselect").options.length = 0;
      		obj = JSON.parse(this.responseText);
					//add empty option in th start 
				 var x = document.createElement("OPTION");
				  x.setAttribute("value", "");
				  var t = document.createTextNode("");
				  x.appendChild(t);
				  document.getElementById("packageselect").appendChild(x);

			for (var i=0;i<obj.length;i++ ) {
				
				  var x = document.createElement("OPTION");
				  x.setAttribute("value", obj[i].id);
				  var t = document.createTextNode(obj[i].rate);
				  x.appendChild(t);
				  document.getElementById("packageselect").appendChild(x);
			}
			
          // document.getElementById(talbaahoption).innerHTML=this.responseText;      
      }
    };
      xmlhttp.open("GET", "/admin/book/"+id, true);
    
    xmlhttp.send();
  
}















