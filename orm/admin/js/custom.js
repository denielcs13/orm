<!----------------Addd   Project----------------------!>
$(document).ready(function (e){

$("#uploadForm").on('submit',(function(e){
														    
e.preventDefault();
$.ajax({
url: "lib/project.php",
type: "POST",
data:  new FormData(this),

contentType: false,
cache: false,
processData:false,
success: function(data){
alert(data);
document.getElementById('project_name').value='';
document.getElementById('project_budget').value='';
document.getElementById('security_amount').value='';
document.getElementById('project_address').value='';
document.getElementById('project_duration').value='';
document.getElementById('datepicker').value='';
document.getElementById('datepicker22').value='';
document.getElementById('pan_no').value='';
document.getElementById('gst_no').value='';
document.getElementById('contact_no').value='';
document.getElementById('email').value='';

document.getElementById('service_charge').value='';
document.getElementById('epf').value='';
document.getElementById('esic').value='';
document.getElementById('contractor').value='';
document.getElementById('cgst').value='';
document.getElementById('sgst').value='';
document.getElementById('igst').value='';


},
error: function(){} 	        
});
}));
});

<!----------------Edit  Project----------------------!>
$(document).ready(function (e){

$("#uploadForm1").on('submit',(function(e){
								
							
														    
e.preventDefault();
$.ajax({
url: "lib/project.php",
type: "POST",
data:  new FormData(this),

contentType: false,
cache: false,
processData:false,
success: function(data){
alert(data);
document.getElementById('project_name').value='';
document.getElementById('project_budget').value='';
document.getElementById('security_amount').value='';
document.getElementById('project_address').value='';
document.getElementById('project_duration').value='';
document.getElementById('datepicker').value='';
document.getElementById('datepicker22').value='';


},
error: function(){} 	        
});
}));
});

<!----------------Close Pupop----------------------!>


function closepopup()
{
	
	location.reload();
}


<!----------------Edit Popup----------------------!>



 $(document).ready(function(){
    $("body").delegate(".editproject", "click", function(event){
	  event.preventDefault();
      var project_id = $(this).attr('project-id');
	  
      $.ajax({

           url: "edit_project.php" ,

           method: "POST",

           data:{editproject:1, project_id:project_id},

           success: function(data){
		
               $("#myModal1").html(data);
           }
        });
    });
     
  
     
     
  });
 
 
 
 <!---------------------Add Material----------------------!>
 
 
 
 $(document).ready(function (e){

$("#uploadmaterial").on('submit',(function(e){
																	    
e.preventDefault();
$.ajax({
url: "lib/material.php",
type: "POST",
data:  new FormData(this),

contentType: false,
cache: false,
processData:false,
success: function(data){
alert(data);
document.getElementById('material_name').value='';
document.getElementById('material_unit').value='';
document.getElementById('material_price').value='';



},
error: function(){} 	        
});
}));
});





<!----------------Edit  material   Popup----------------------!>



 $(document).ready(function(){
    $("body").delegate(".editmaterial", "click", function(event){
	  event.preventDefault();
      var material_id = $(this).attr('material-id');
	  
      $.ajax({

           url: "edit_material.php" ,

           method: "POST",

           data:{editmaterial:1, material_id:material_id},

           success: function(data){
		
               $("#myModal1").html(data);
           }
        });
    });
     
  
     
     
  });
 
 
 
 <!----------------Addd   Employee----------------------!>
$(document).ready(function (e){

$("#employeeForm").on('submit',(function(e){
														    
e.preventDefault();
$.ajax({
url: "lib/employee.php",
type: "POST",
data:  new FormData(this),

contentType: false,
cache: false,
processData:false,
success: function(data){
alert(data);
document.getElementById('name').value='';
document.getElementById('email').value='';
document.getElementById('phone').value='';
document.getElementById('address').value='';
document.getElementById('datepicker').value='';
document.getElementById('proof').value='';
document.getElementById('image').value='';
document.getElementById('resume').value='';
document.getElementById('qualification').value='';
document.getElementById('designation').value='';
document.getElementById('salary').value='';
document.getElementById('uan').value='';
document.getElementById('esi').value='';
document.getElementById('gender').value='';


},
error: function(){} 	        
});
}));
});








<!----------------Edit  Employee   Popup----------------------!>



 $(document).ready(function(){
    $("body").delegate(".editemployee", "click", function(event){
	  event.preventDefault();
      var employee_id = $(this).attr('employee-id');
	  
      $.ajax({

           url: "edit_employee.php" ,

           method: "POST",

           data:{editemployee:1, employee_id:employee_id},

           success: function(data){
		
               $("#myModal1").html(data);
           }
        });
    });
     
  
     
     
  });
 
 
 
 
  <!---------------------Add Tax----------------------!>
 
 
 
 $(document).ready(function (e){

$("#uploadtax").on('submit',(function(e){
								   
						   
														    
e.preventDefault();
$.ajax({
url: "lib/tax.php",
type: "POST",
data:  new FormData(this),

contentType: false,
cache: false,
processData:false,
success: function(data){
alert(data);
document.getElementById('tax_value').value='';
document.getElementById('tax_name').value='';




},
error: function(){} 	        
});
}));
});
 
 
 
 
 <!----------------Edit  Tax----------------------!>



 $(document).ready(function(){
    $("body").delegate(".edittax", "click", function(event){
	  event.preventDefault();
      var tax_id = $(this).attr('tax-id');
	  
      $.ajax({

           url: "edit_tax.php" ,

           method: "POST",

           data:{edittax:1, tax_id:tax_id},

           success: function(data){
		
               $("#myModal1").html(data);
           }
        });
    });
     
  
     
     
  });




<!-------------------Search Employe-----------------------!>


$(document).ready(function(){
 
 $("#search_box").keyup(function(){
						  
  var txt = $(this).val();
  if(txt != ""){
    $.ajax({
     
      url : "employee-search.php",
      method : "POST",
      data :{search:txt},
      dataType : "text",
      success : function(data){
		 
        $("#result_search").html(data);
      }
     
    });
  }
  else if(txt == ""){
      $("#result_search").html(data);
  }
  else{
   $("#result_search").html(data);
  }
  
  
 });
 

 
  
});




<!-------------------Search Project -----------------------!>


$(document).ready(function(){
 
 $("#project_search").keyup(function(){

  var txt = $(this).val();
  if(txt != ""){
    $.ajax({
     
      url : "project-search.php",
      method : "POST",
      data :{search:txt},
      dataType : "text",
      success : function(data){
		
        $("#project_search2").html(data);
      }
     
    });
  }
  else if(txt == ""){

      $("#project_search2").html(data);
  }
  else{
   $("#project_search2").html(data);

  }
  
  
 });
 

 
  
});







  <!---------------------Add Designation----------------------!>
 
 
 
 $(document).ready(function (e){

$("#uploaddesignation").on('submit',(function(e){
								   
						   
														    
e.preventDefault();
$.ajax({
url: "lib/designation.php",
type: "POST",
data:  new FormData(this),

contentType: false,
cache: false,
processData:false,
success: function(data){
alert(data);
document.getElementById('designation').value='';





},
error: function(){} 	        
});
}));
});
 
 
 
  <!----------------Edit  Tax----------------------!>



 $(document).ready(function(){
    $("body").delegate(".editdesignation", "click", function(event){
	  event.preventDefault();
      var designation_id = $(this).attr('designation-id');
	  
      $.ajax({

           url: "edit_designation.php" ,

           method: "POST",

           data:{editdesignation:1, designation_id:designation_id},

           success: function(data){
		
               $("#myModal1").html(data);
           }
        });
    });
     
  
     
     
  });

 



<!----------------Generate Salary----------------------!>



 $(document).ready(function(){
    $("body").delegate(".salary", "click", function(event){
	  event.preventDefault();
      var employee_id = $(this).attr('employee-id');
	  
      $.ajax({

           url: "salary.php" ,

           method: "POST",

           data:{salary:1, employee_id:employee_id},

           success: function(data){
			 
		
               $("#myModal3").html(data);
           }
        });
    });
     
  
     
     
  });

 
 
 
 
 
 
  <!----------------Addd   Services----------------------!>
$(document).ready(function (e){

$("#addservice").on('submit',(function(e){
													    
e.preventDefault();
$.ajax({
url: "lib/service.php",
type: "POST",
data:  new FormData(this),

contentType: false,
cache: false,
processData:false,
success: function(data){
alert(data);
document.getElementById('service_name').value='';
document.getElementById('hsn_code').value='';
document.getElementById('rate').value='';
document.getElementById('epf').value='';
document.getElementById('esi').value='';
document.getElementById('contractor').value='';
document.getElementById('cgst').value='';
document.getElementById('sgst').value='';
document.getElementById('igst').value='';



},
error: function(){} 	        
});
}));
});








 
 
 

<!----------------Edit Service----------------------!>



 $(document).ready(function(){
    $("body").delegate(".editservice", "click", function(event){
	  event.preventDefault();
      var service_id = $(this).attr('service-id');
	  
      $.ajax({

           url: "edit_service.php" ,

           method: "POST",

           data:{editservice:1, service_id:service_id},

           success: function(data){
		
               $("#myModal1").html(data);
           }
        });
    });
     
  
     
     
  });
 
 
 
 <!-----------------------------Show product details ---------------------------------------------------------!>
 
 
 
 
 
 
 
 
 
  
 <!---------------------Add Invoice in Session ----------------------!>
 
 
 
 $(document).ready(function (e){

$("#uploadinvoice").on('submit',(function(e){
		alert("call");															    
e.preventDefault();
$.ajax({
url: "include/header.php",
type: "POST",
data:  new FormData(this),

contentType: false,
cache: false,
processData:false,
success: function(data){
alert(data);
document.getElementById('material_name').value='';
document.getElementById('material_unit').value='';
document.getElementById('material_price').value='';



},
error: function(){} 	        
});
}));
});

 
 
 
 