<?php include('include/config.php'); ?>
<?php include('include/top-menu.php'); ?>
<?php include('include/header.php'); 

$id = $_GET['token'];
$query="Select * from product where admin_id='".$admin_id."' && company_id = '$id'";
$data=fetch_query($con,$query);


?>



  <div class="boxed">
    
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
      <div class="pageheader hidden-xs">
        <h3><i class="fa fa-file-text-o"></i><?php echo $data[0]['company_name']; ?></h3>
        <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
          <ol class="breadcrumb">
            <li> <a href="dashbord.php"> Home </a> </li>
            <li class="active"><?php echo $data[0]['company_name']; ?></li>
          </ol>
        </div>
      </div>
      <!--Page content-->
      <!--===================================================-->
    
      <div id="page-content">
        <div class="row">
          <div class="eq-height">
            <div class="col-sm-12 eq-box-sm">
              <div class="panel">
              
              <div class="row"><div class="col-lg-6">
              
              
              
              </div><div class="col-lg-3">   <div class="searchbox">
  </div>
  </div>
  <div class="col-lg-3 add-button text-right"><div class="searchbox">
  
  <a class="btn btn-success" id="add_data" data-pro_id="<?php echo $data[0]['company_id']; ?>" data-id="" data-admin_id="<?php echo $admin_id; ?>" data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false">Add New Title</a></div></div></div>
  <hr>
                <div class="panel-body">
				<div id="error-msg-page"></div>
				<?php 
				  
				$query2="Select * from title where  product_id='$id'";
				$i=1;
				$all_data=fetch_query($con,$query2);
				if(!empty($all_data))
				{
			?>
                  <div class="table-responsive">
                    <table id="demo-dt-basic" class="table table-striped table-bordered">
                      <thead>
                        <tr>
										<th>Sr. No.</th>
										
                                        <th>Main Title</th>
										<th>Sub Title</th>
										<th>EDIT</th>
										<th>DELETE</th>
                        </tr>
                      </thead>
					  
					  <?php foreach($all_data as $about_data) {
		
					  ?>
						  
                      <tbody  id="project_search2" name="search">
                         
                        <tr>
						
						<td> <?php echo $i; ?></td>
                         
                          <td><?php echo $about_data['title_name']; ?></td>
						  <?php
						 $query3="Select sub_t_name from subtitle where  title_id='".$about_data['title_id']."'";
							$data3=fetch_query($con,$query3);
						  //print_r($data3);
						  
						  ?>
						
						
						  <td><?php  
						  foreach($data3 as $newdata){
						 
						  echo  $newdata['sub_t_name'].'<br>'; 
						  }
						  ?></td>
					      
                  <td><a class="btn btn-info btn-sm editproject" data-toggle="modal" data-target="#myModal" id="add_data" data-pro_id="<?php echo $data[0]['company_id']; ?>" data-id="<?php echo $about_data['title_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>"><span class="fa fa-pencil-square-o"></span> Edit</a> </td>
						  
                          <td><a style="text-decoration:none;" class="approved btn btn-danger" id="delete" data-id="<?php echo $about_data['title_id']; ?>" data-admin_id="<?php echo $about_data['admin_id']; ?>" ><i class="fa fa-trash"></i> Delete</a>
                                                      </td>
                        </tr>
                     
  					                       </tbody>
										   
										   <?php 
										   $i++;
					  } 
										   ?>
                    </table>
                  </div>
				  <?php
				  
				}else{
				echo '<div class="alert alert-danger">No Data Available.</div>';	
				}
				  ?>
                </div>
                <!--===================================================-->
                <!--End Block Styled Form -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--===================================================-->
      <!--End page content-->
    </div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->
  </div>
 <?php include('include/modal.php'); ?>
  

<?php include('include/footer.php'); ?>
<script type="text/javascript">

$(document).ready(function(){
$("body").on("click","#addButton",function () {
	var counter=$("[name='textbox[]']").length;		
	if(counter>=12){
            $("#error-msg").show().html('<div class="alert alert-danger">Only 12 Sub Titles are allow</div>'); 
            return false;
	}   
		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
  	 
	newTextBoxDiv.after().html('<div class="col-sm-3"<div class="form-group"><label class="control-label"> SUB TITLE '+(counter+1)+' :</label><input type="text" class="form-control" placeholder="Enter Sub Title Name" name="textbox[]"  id="textbox1" required /> </div></div><div class="col-sm-3"><div class="form-group"><label class="control-label"> SUB TITLE '+(counter+2)+'  :</label><input type="text" class="form-control" placeholder="Enter Sub Title Name" name="textbox[]"  id="textbox1" required /> </div> </div><div class="col-sm-3"> <div class="form-group"><label class="control-label"> SUB TITLE '+(counter+3)+'  :</label><input type="text" class="form-control" placeholder="Enter Sub Title Name" name="textbox[]"  id="textbox1" required /> </div></div> <div class="col-sm-3"><div class="form-group"><label class="control-label"> SUB TITLE '+(counter+4)+'  :</label><input type="text" class="form-control" placeholder="Enter Sub Title Name" name="textbox[]"  id="textbox1" required /> </div></div>');        
	newTextBoxDiv.appendTo("#TextBoxesGroup");		
	counter ++;
     });
    /*  $("#removeButton").click(function () {
		var =$("[name='textbox[]']").length;	
	if(counter==4){
          alert("No more textbox to remove");
          return false;
       }   
        
	counter--;
			
        $("#TextBoxDiv" + counter).remove();
			
     }); */
	
  });
</script>

<script>
 $(document).ready(function(){
	a_url='ajax/moredetails.php';
	var a_response=$(".modal-content");	
	$("body").on("click","#add_data",function(){		
	var a_request="action=MOREDETAILS"+"&admin_id="+$(this).data("admin_id")+"&product_id="+$(this).data("pro_id")+"&id="+$(this).data("id");
	a_response.html('<div id="loader"><img src="img/loading.gif" alt="loading subcategory" style="width:50%" /></div>');
	 var redirecturl='';
	fetch_data(a_url,a_request,a_response,redirecturl);	
	$('#loader').slideUp(200, function() {
	$(this).remove(); 
	});
	});

	 $("body").on("click","#update_title",function(){ 
	  var a_response1=$("#error-msg");
	 if($("#main_title").val()==''){
		a_response1.show().html('<div class="alert alert-danger">Please Enter Title</div>'); 
		return false;
	 } else{
	 var update_from=new FormData($("#form-update")[0])
	 var a_request1=update_from;
	 $("#update_title").css("display","none");
	 $("#update_title").after('<img id="login_image" src="img/loading.gif" alt="loading subcategory" width="5%" />');
	 var redirecturl='';
	 insert_data(a_url,a_request1,a_response1,redirecturl);
	 $('#login_image').slideUp(200, function() {
		$(this).remove(); 
	}); 
	$("#update_title").show();
	 }
	 });

$("body").on("click","#delete",function(){	   
		   var thisvalue=$(this).parents().parents('tr');
		   var a_id=$(this).data('id');
		   var admin_id=$(this).data('admin_id');
		   var error_id=$("#error-msg-page");
		   var postdata="action=DELETE_DATA"+"&title_id="+a_id+"&admin_id="+admin_id;
		    var checkcon=confirm("Are you sure want to delete");
		   if(checkcon){
			delete_data(a_url,postdata,error_id,thisvalue);
		   }
	     });	 
}); 

 
</script>  
<script src="js/myjs/function.js" ></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
